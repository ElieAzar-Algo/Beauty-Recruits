<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\FieldExpertise;

class AuthController extends Controller
{

    public function indexLogin()
    {
        if (auth()->guard('applicant')->check() || auth()->guard('company')->check())
        {
            return view('front.home');
        }
        else 
        {
            return view('front.login');
        }
    }

    public function indexRegister()
    {

        $data = FieldExpertise::all();

        if (auth()->guard('applicant')->check() || auth()->guard('company')->check())
        {
            return view('front.home');
        }
        else 
        {
            return view('front.register',compact('data'));
        }
    }

    public function logout()
    {
        
        if (auth()->guard('applicant')->check())
        {
            auth()->guard('applicant')->logout();
        }
         elseif(auth()->guard('company')->check())
        {
            auth()->guard('company')->logout();
        }
        else 
        {  
             auth()->guard('user')->logout();
        }

        return redirect()->route('home');
    }


}
