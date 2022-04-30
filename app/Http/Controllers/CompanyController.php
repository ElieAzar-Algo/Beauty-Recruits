<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\ApplicantJob;
use App\Subscription;
use App\SubscriptionUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Company;
use App\Job;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Mail;
use Session;
use URL;
use App\Http\Requests\CompanyValidator;

class CompanyController extends Controller
{
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (auth()->guard('company')->attempt($credentials)) {
            $id = auth()->guard('company')->id();
            $applicant = Company::where('id', $id)->first();

            if ($applicant->verified == 1) {
                $privUrl = str_replace(url('/'), '', Session::get('url.intended'));
                if ($privUrl == '/login-page') {
                    return redirect()->route('home');
                }
                return Redirect::to(Session::get('url.intended'));
            } else {
                $logout = auth()->guard('company')->logout();

                return redirect()->route('waiting-verification');
            }
        } else {
            return Redirect::back()->with('failed_login', 'Incorrect email or password. <a href="' . url('/company-reset-password') . '"> Reset Password  </a> ');
//            return redirect()->route('login');
        }
    }


    public function register(CompanyValidator $request)
    {
        $applicant = Company::where('email', $request->email)->first();
        if (!$applicant) {

            $token = openssl_random_pseudo_bytes(16);

            //Convert the binary data into hexadecimal representation.
            //Cryptographic Token
            $token = bin2hex($token);

            if (count($request->all()) > 0) {

                if ($token) {
                    $company = new Company();
                    $company->fill([

                        'username' => $request->username,
                        'email' => $request->email,
                        'password' => $request->password,
                        'name' => $request->name,
                        'introduction' => $request->introduction,
                        'phone' => $request->phone,
                        'location' => $request->location,
                        'website' => $request->website,
                        'expertise_id' => $request->expertise_id,

                    ]);
                    $company->token = $token;

                    if ($company->save()) {
                        $mailData = array(
                            'message' => 'Verification Email Beauty Recruits',
                            'name' => $company->full_name,
                            'token' => $token,
                            'id' => $company->id,
                            'email' => $company->email
                        );

                        Mail::send('mail.company-verificationEmail', ["data" => $mailData], function ($message) use ($request) {
                            $message->from(config('mail.from_email'), 'Beauty-Recruits');
                            $message->to($request->email, $request->full_name)->subject('Beauty Recruits Verification Email');
                        });


                        return redirect()->route('not-verified');
                    } else {
                        $message = "Operation Failed";
                        return view('register', compact('message'));
                    }
                }
            } else {
                return redirect()->route('register');
            }
        } else {
            return Redirect::back()->with('failed_register', 'The email has already been taken.');
        }
    }


    public function show()
    {

        $id = auth()->guard('company')->id();

        $company = Company::where('id', $id)->with('field_expertise')->first();
        $myJobs = Job::where('company_id', $id)->get();

        return view('front.companyProfile', compact('company', 'myJobs'));
    }

    public function dashboard()
    {

        $id = auth()->guard('company')->id();

        $company = Company::where('id', $id)->with('field_expertise')->first();
        $myJobs = Job::where('company_id', $id)->get();
        $remaining_cv = 0;
        $days_to_recharge = 0;

        $date = Carbon::now();

        $subscriptionUser = SubscriptionUser::where('user_id', '=', auth()->user()->id)->whereDate('end_date', '>', $date)
            ->where('success', '=', 1)->first();
        if ($subscriptionUser) {
            $subscription = Subscription::findOrFail($subscriptionUser->subscription_id);
            $remaining_cv = $subscription->download_cv - $subscriptionUser->viewed_cv;
            $subscriptionUserDate = Carbon::parse($subscriptionUser->end_date);
            $days_to_recharge = $date->diffInDays($subscriptionUserDate);
        }

        $applicants = ApplicantJob::whereIn('job_id', $myJobs->pluck('id'))->orderBy('created_at', 'DESC')->get();
        $applicantsNumber = count($applicants);
        $job_posted = count($myJobs);

        return view('front.companyDashboard', compact(
            'company', 'myJobs',
            'remaining_cv',
            'days_to_recharge',
            'applicants', 'job_posted', 'applicantsNumber'
        ));
    }

    public function update(Request $request)
    {
        $id = auth()->guard('company')->id();

        $company = Company::find($id);

        if ($company) {
            $company->update($request->all());
            if ($company->save()) {
                return redirect()->route('company-profile');
            } else {
                return response()->json([
                    'success' => false,
                    'message' => "Operation Failed",
                ], 404);
            }
        }
    }

    public function index()
    {
        if (request()->has('letter')) {
            $data = Company::where('name', "LIKE", request('experience'), "%")
                ->orderBy('created_at', 'DESC')
                ->with('job')
                ->with('field_expertise')
                ->paginate(10)
                ->appends('letter', request('letter'));
            return view('front.company-listing', compact('data'));
        } else {
            $data = Company::with('job')
                ->orderBy('created_at', 'DESC')
                ->with('field_expertise')
                ->paginate(10);


            return view('front.company-listing', compact('data'));
        }

    }


    public function showDetails($id)
    {
        $company = Company::where('id', $id)
            ->with('job')
            ->with('field_expertise')
            ->first();

        if ($company) {
            return view('front.company-details', compact('company'));
        }
    }

    public function reset(Request $request)
    {

        $rules = array(
            'email' => 'required|email');
        $inputs = array(
            'email' => $request->email
        );
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return redirect()->back()->with('failed_login', 'You did not enter your email correctly');
        }

        $user = Company::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('failed_login', 'Failed! email is not registered.');
        }


        $token = openssl_random_pseudo_bytes(16);

        //Convert the binary data into hexadecimal representation.
        //Cryptographic Token
        $token = bin2hex($token);

        $user->token = $token;
//        $user['is_verified'] = 0;
        $user->save();
        $mailData = array(
            'name' => 'Verification Email Beauty Recruits',
            'token' => $token
        );


        Mail::send('mail.company-reset-password', ['user' => $mailData], function ($message) use ($user) {
            $message->from(config('mail.from_email'), 'Beauty-Recruits');
            $message->to($user->email, $user->username)->subject('Password Reset Link');
        });

        if (Mail::failures() != 0) {
            return redirect()->route('login')->with('failed_login', 'Success! password reset link has been sent to your email');
        }
        return back()->with('failed_login', 'Failed! there is some issue with email provider');
    }

    public function updatePassword(Request $request)
    {
        $rules = array(
            'email' => 'email|required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password');
        $inputs = array(
            'email' => $request->email,
            'password' => $request->password,
            'confirm_password' => $request->confirm_password,
        );
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return redirect()->back()->with('failed_login', 'Password does not match, or must contains at least one number, one lowercase, one uppercase letter, and six characters');
        }

        $user = Company::where('email', $request->email)->first();
        if ($user) {
            $user->fill([
                'token' => '',
                'password' => $request->password]);
            $user->save();
            return redirect()->route('login')->with('failed_login', 'Success! password has been changed');
        }
        return redirect()->back()->with('failed_login', 'Failed! something went wrong');
    }

}
