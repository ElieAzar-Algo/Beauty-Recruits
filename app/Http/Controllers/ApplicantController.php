<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;

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

         if($applicant->save())
         {
             return view('waitingVerification');
         }
         else
         {
            $message = "Operation Failed";
            return view('register', compact('message'));
         }
    }

    
}
