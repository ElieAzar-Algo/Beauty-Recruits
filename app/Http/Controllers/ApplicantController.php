<?php

namespace App\Http\Controllers;

use App\ApplicantJob;
use App\Job;
use App\Subscription;
use App\SubscriptionUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Applicant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ApplicantValidator;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use Mail;
use Session;
use URL;

class ApplicantController extends Controller
{
    public function login()
    {

        $credentials = request(['email', 'password']);

        if (auth()->guard('applicant')->attempt($credentials)) {
            $id = auth()->guard('applicant')->id();
            $applicant = Applicant::where('id', $id)->first();

            if ($applicant->verified == 1) {
                $privUrl = str_replace(url('/'), '', Session::get('url.intended'));

                if ($privUrl == '/login-page') {
                    return redirect()->route('home');
                }
                return Redirect::to(Session::get('url.intended'));
            } else {
                $logout = auth()->guard('applicant')->logout();

                return redirect()->route('waiting-verification');
            }
        } else {
            return Redirect::back()->with('failed_login', 'Incorrect email or password. <a href="' . url('/reset-password') . '"> Reset Password  </a> ');
//            return redirect()->route('login');
        }
    }


    public function register(ApplicantValidator $request)
    {

        // dd($request->resume_pdf);
        $applicant = Applicant::where('email', $request->email)->first();
        if (!$applicant) {


            $token = openssl_random_pseudo_bytes(16);

            //Convert the binary data into hexadecimal representation.
            //Cryptographic Token
            $token = bin2hex($token);
            if (count($request->all()) > 0) {

                if ($token) {
                    $folderPath = public_path('storage/applicant-resumes');
                    if (!File::exists($folderPath)) {
                        $response = mkdir($folderPath);
                    }

                    $applicant = new Applicant();

                    $applicant->fill([

                        'username' => $request->username,
                        'email' => $request->email,
                        'password' => $request->password,
                        'full_name' => $request->full_name,
                        'has_answered' => 1,
                        'title' => $request->title,
                        'description' => $request->description,
                        'location' => $request->location,

                        'phone' => $request->phone,
                        'years_of_experience' => $request->years_of_experience,
                        'expertise_id' => $request->expertise_id,
                    ]);
                    $date = date('Y-m-d-h-i-sa');

                    $fileName = 'MyResume-' . $request->username . $date . '.pdf';

                    $path = $request->file('resume_pdf')->storeAs('public/applicant-resumes', $fileName);
                    $applicant->resume_pdf = 'applicant-resumes/' . $fileName;
// delete folder storage in buplic then run  php artisan storage:link
//                    $photo = $request->file('photo')->storeAs('applicant-photos', 'MyPhoto-' . $request->username . $date . '.jpg', 'public');
                    $applicant->photo = '';//$photo;

                    $applicant->token = $token;

                    if ($applicant->save()) {

                        // Log::info(config('mail.from_email'));
                        // Log::info($request->email);
                        // Log::info($request->full_name);
                        $mailData = array(
                            'message' => 'Verification Email Beauty Recruits',
                            'name' => $applicant->full_name,
                            'token' => $token,
                            'id' => $applicant->id,
                            'email' => $applicant->email
                        );

//                        Mail::send('mail.applicant-verificationEmail', ["data" => $mailData], function ($message) use ($request) {
//                            $message->from(config('mail.from_email'), 'Beauty-Recruits');
//                            $message->to($request->email, $request->full_name)->subject('Beauty Recruits Verification Email');
//                        });


                        return redirect()->route('not-verified');
                    } else {
                        // $message = "Operation Failed";
                        // return view('register', compact('message'));
                        return response();
                    }
                }
            } else {
                return redirect()->route('register');
            }
        } else {
            return Redirect::back()->with('failed_register', 'The email has already been taken.');
        }
    }

    public function history()

    {

        $jobApplicant = ApplicantJob::where('applicant_id', '=', auth()->guard('applicant')->id())->pluck('id');

        $data = Job::with('company')
            ->orderBy('created_at', 'DESC')
            ->with('field_expertise')
            ->whereIn('id', $jobApplicant)
            ->paginate(4);
        return view('front.job-history', compact('data'));
    }

    function reset(Request $request)
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

        $user = Applicant::where('email', $request->email)->first();
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


        Mail::send('mail.reset-password', ['user' => $mailData], function ($message) use ($user) {
            $message->from(config('mail.from_email'), 'Beauty-Recruits');
            $message->to($user->email, $user->username)->subject('Password Reset Link');
        });

        if (Mail::failures() != 0) {
            return redirect()->route('login')->with('failed_login', 'Success! password reset link has been sent to your email');
        }
        return back()->with('failed_login', 'Failed! there is some issue with email provider');
    }

    public
    function updatePassword(Request $request)
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

        $user = Applicant::where('email', $request->email)->first();
        if ($user) {
            $user->fill([
                'token' => '',
                'password' => $request->password]);
            $user->save();
            return redirect()->route('login')->with('failed_login', 'Success! password has been changed');
        }
        return redirect()->back()->with('failed_login', 'Failed! something went wrong');
    }

    public
    function downloadResume($id)
    {
        $applicant = Applicant::find($id);
        // dd($applicant->resume_pdf);
        $path = $applicant->resume_pdf;

        return Storage::download($path);
    }


    public
    function show()
    {

        $id = auth()->guard('applicant')->id();

        $applicant = Applicant::where('id', $id)->with('field_expertise')->first();

        return view('front.applicantProfile', compact('applicant'));
    }

    public
    function dashboard()
    {

        $id = auth()->guard('applicant')->id();

        $applicant = Applicant::where('id', $id)->with('field_expertise')->first();
        $applicants = ApplicantJob::where('applicant_id', '=', $id)->orderBy('created_at', 'DESC')->get();

        $applicantsNumber = count($applicants);

        return view('front.applicantDashboard', compact('applicant', 'applicants', 'applicantsNumber'));
    }

    private function isSubscriptionWorking()
    {
        $showLink = -1;
        if (auth()->guard('company')->id()) {
            $date = Carbon::now();
            $subscriptionUser = SubscriptionUser::where('user_id', '=', auth()->guard('company')->id())->whereDate('end_date', '>', $date)->where('success', '=', 1)->first();
            if ($subscriptionUser) {
                $subscription = Subscription::findOrFail($subscriptionUser->subscription_id);
                $download_cv = $subscription->download_cv - $subscriptionUser->download_cv;
                if ($subscriptionUser && $download_cv > 0) {
                    $showLink = $subscriptionUser->id;
                }
            }
        }
        return $showLink;

    }

    public
    function index()
    {

        $data = Applicant::
        join('fields_expertises', 'fields_expertises.id', '=', 'applicants.expertise_id')
            ->select(DB::raw('LEFT(applicants.full_name , 3) as full_name'), 'applicants.id as applicant_id', 'applicants.full_name as full_text_name', 'applicants.location', 'applicants.resume_pdf', 'applicants.years_of_experience', 'applicants.photo',
                'fields_expertises.*')
//            ->with('field_expertise')
            ->orderBy('applicants.created_at', 'DESC')
            ->paginate(10);
        $showLink = $this->isSubscriptionWorking() == -1 ? false : true;
        return view('front.candidate-listing', compact('data', 'showLink'));

    }

    public function getPdf($id)
    {
        $subscriptionId = $this->isSubscriptionWorking();
        if ($subscriptionId != -1) {
            $applicantPdf = Applicant::where('id', '=', $id)->first();
            $subscriptionUser = SubscriptionUser::where('id', '=', $subscriptionId)->first();
            $subscriptionUser->viewed_cv = $subscriptionUser->viewed_cv + 1;
            $subscriptionUser->save();
            return redirect('/storage/' . $applicantPdf->resume_pdf);
        }
        abort(404);

    }

    public
    function update(Request $request)
    {
        $id = auth()->guard('applicant')->id();

        $company = Applicant::find($id);
        $date = time();
        if ($request->hasFile('resume_pdf')) {
            $path = $request->file('resume_pdf')->storeAs('public/applicant-resumes', 'MyResume-' . $request->username . $date . '.pdf');

        }


        if ($company) {
            $company->update($request->all());
            $company->resume_pdf = $path;
            if ($company->save()) {
                return redirect()->route('applicant-profile');
            } else {
                return response()->json([
                    'success' => false,
                    'message' => "Operation Failed",
                ], 404);
            }
        }
    }


}
