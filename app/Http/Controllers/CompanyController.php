<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Mail;

class CompanyController extends Controller
{
    public function login() 
    {
        $credentials = request(['email', 'password']);
        
        if (auth()->guard('company')->attempt($credentials))
        {
            $id = auth()->guard('company')->id();
            $applicant = Company::where('id', $id)->first();

                if($applicant->verified == 1)
                {
                    return redirect()->route('home');
                }
                else
                {
                    $logout = auth()->guard('company')->logout();
                    
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

        if($token){
        $company = new Company();
        $company->fill([

            'username'=> $request->username,
            'email' => $request->email,
            'password'    => $request->password,
            'name' => $request->name,
            'introduction' => $request->introduction,
            'phone'=>$request->phone,
            'location'=>$request->location,
            'website'=>$request->website,
            'expertise_id'=>$request->expertise_id,
            
         ]);
         $company->token = $token;

         if($company->save())
         {
            $mailData = array(
                'message' => 'Verification Email Beauty Recruits',
                'name' => $company->full_name,
                'token' => $token ,
                'id' => $company->id,
                'email' => $company->email
            );
    
            Mail::send('mail.company-verificationEmail', ["data" => $mailData], function($message) use ($request)
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

        $id = auth()->guard('company')->id();
        
        $company = Company::where('id', $id)->with('field_expertise')->first();

        return view('front.companyProfile', compact('company'));
    }

    
}
