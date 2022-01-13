<?php

namespace App\Http\Controllers;

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

                    $path = $request->file('resume_pdf')->storeAs('public/applicant-resumes', 'MyResume-' . $request->username . $date . '.pdf');
                    $applicant->resume_pdf = $path;

                    $photo = $request->file('photo')->storeAs('applicant-photos', 'MyPhoto-' . $request->username . $date . '.jpg', 'public');
                    $applicant->photo = $photo;

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

                        Mail::send('mail.applicant-verificationEmail', ["data" => $mailData], function ($message) use ($request) {
                            $message->from(config('mail.from_email'), 'Beauty-Recruits');
                            $message->to($request->email, $request->full_name)->subject('Beauty Recruits Verification Email');
                        });


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

    public function downloadResume($id)
    {
        $applicant = Applicant::find($id);
        // dd($applicant->resume_pdf);
        $path = $applicant->resume_pdf;

        return Storage::download($path);
    }


    public function show()
    {

        $id = auth()->guard('applicant')->id();

        $applicant = Applicant::where('id', $id)->with('field_expertise')->first();

        return view('front.applicantProfile', compact('applicant'));
    }

    public function index()
    {
//
//        $data = Applicant::orderBy('created_at', 'DESC')
//            ->with('field_expertise')
//            ->paginate(10);
        $data = Applicant::
        join('fields_expertises', 'fields_expertises.id', '=', 'applicants.expertise_id')
            ->select(DB::raw('LEFT(applicants.full_name , 3) as full_name'), 'applicants.location', 'applicants.years_of_experience', 'applicants.photo',
                'fields_expertises.*')
//            ->with('field_expertise')
            ->orderBy('applicants.created_at', 'DESC')
            ->paginate(10);
        $x = 0;
        return view('front.candidate-listing', compact('data'));

    }

    public function update(Request $request)
    {
        $id = auth()->guard('applicant')->id();

        $company = Applicant::find($id);

        if ($company) {
            $company->update($request->all());
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
