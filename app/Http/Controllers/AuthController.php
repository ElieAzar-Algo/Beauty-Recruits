<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        if (auth()->guard('applicant')->check() || auth()->guard('company')->check())
        {
            return view('front.home');
        }
        else 
        {
            return view('front.register');
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
