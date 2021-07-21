<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use Illuminate\Support\Facades\Log;

use Mail;

class ApplicantController extends Controller
{
    public function login() 
    {
        $credentials = request(['email', 'password']);
        
        if (auth()->guard('applicant')->attempt($credentials))
        {
            $id = auth()->guard('applicant')->id();
            $applicant = Applicant::where('id', $id)->first();

                if($applicant->verified == 1)
                {
                    return redirect()->route('home');
                }
                else
                {
                    $logout = auth()->guard('applicant')->logout();
                    
                    $message = "You are not verified yet";
                    return view('notVerified', compact('message'));
                }
        }
        else
        {
            return redirect()->route('login'); 
        }
    }

    

    public function register(Request $request)
    {

        $token = openssl_random_pseudo_bytes(16);

        //Convert the binary data into hexadecimal representation.
        //Cryptographic Token 
        $token = bin2hex($token);

        if($token)
        {
        $applicant = new Applicant();

        $applicant->fill([

            'username'=> $request->username,
            'email' => $request->email,
            'password'    => $request->password,
            'full_name' => $request->full_name,
            'has_answered'  => 1,
            'title'=> $request->title,
            'description'=>$request->description,
            'location'=>$request->location,
            'resume_pdf'=>$request->resume_pdf,
            'phone'=>$request->phone,
            'years_of_experience'=>$request->years_of_experience,
            'expertise_id'=>$request->expertise_id,
         ]);
            $applicant->token = $token;
         if($applicant->save())
         {

            // Log::info(config('mail.from_email'));
            // Log::info($request->email);
            // Log::info($request->full_name);
            $mailData = array(
                'message' => 'Verification Email Beauty Recruits',
                'name' => $applicant->full_name,
                'token' => $token ,
                'id' => $applicant->id,
                'email' => $applicant->email
            );
    
            Mail::send('mail.applicant-verificationEmail', ["data" => $mailData], function($message) use ($request)
            {
                $message->from(config('mail.from_email'),'Beauty-Recruits');
                $message->to($request->email, $request->full_name)->subject('Beauty Recruits Verification Email');
            });

            
            return redirect()->route('waiting-verification');
         }
         else
         {
            $message = "Operation Failed";
            return view('register', compact('message'));
         }
        }
    }

       public function show()
        {

            $id = auth()->guard('applicant')->id();
            
            $applicant = Applicant::where('id', $id)->with('field_expertise')->first();

            return view('front.applicantProfile', compact('applicant'));
        }

    
}
