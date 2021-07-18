<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function indexLogin()
    {
        if (auth()->guard('applicant')->check() || auth()->guard('company')->check())
        {
            return view('home');
        }
        else 
        {
            return view('login');
        }
    }

    public function indexRegister()
    {
        if (auth()->guard('applicant')->check() || auth()->guard('company')->check())
        {
            return view('home');
        }
        else 
        {
            return view('register');
        }
    }

    public function logout()
    {
        if (auth()->guard('applicant'))
        {
            auth()->guard('applicant')->logout();
        }
        elseif(auth()->guard('company'))
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
