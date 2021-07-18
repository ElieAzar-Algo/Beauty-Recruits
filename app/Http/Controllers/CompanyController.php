<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

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

         if($company->save())
         {
             return redirect()->route('waiting.verification');
         }
         else
         {
            $message = "Operation Failed";
            return view('register', compact('message'));
         }
    }
}
