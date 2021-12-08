<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\FieldExpertise;
use Session;
use URL;
class AuthController extends Controller
{

    public function indexLogin()
    {
        Session::put('url.intended',URL::previous());
        if (auth()->guard('applicant')->check() || auth()->guard('company')->check()) {
            return view('front.home');
        } else {
            return view('front.login');
        }
    }

    public function indexRegister()
    {

        $data = FieldExpertise::all();

        if (auth()->guard('applicant')->check() || auth()->guard('company')->check()) {
            return view('front.home');
        } else {
            return view('front.register', compact('data'));
        }
    }

    public function indexResetPassword()
    {

        $data = FieldExpertise::all();

        if (auth()->guard('applicant')->check() || auth()->guard('company')->check()) {
            return view('front.home');
        } else {
            return view('front.reset', compact('data'));
        }
    }

    public function forgotPasswordValidate(Request $request)
    {
        if ($request->has('token')) {
            $user = Applicant::where('token', $request->token)->where('email_verification', 1)->first();

            if ($user) {
                $email = $user->email;
                return view('front.change-password', compact('email'));
            }
        }
        return redirect()->route('reset')->with('failed_login', 'Password reset link is expired or your mail is inactive');
    }

    public function indexCompanyResetPassword()
    {

        $data = FieldExpertise::all();

        if (auth()->guard('applicant')->check() || auth()->guard('company')->check()) {
            return view('front.home');
        } else {
            return view('front.company-reset', compact('data'));
        }
    }

    public function forgotCompanyPasswordValidate(Request $request)
    {
        if ($request->has('token')) {
            $user = Company::where('token', $request->token)->where('email_verification', 1)->first();

            if ($user) {
                $email = $user->email;
                return view('front.company-change-password', compact('email'));
            }
        }
        return redirect()->route('company-reset')->with('failed_login', 'Password reset link is expired or your mail is inactive');
    }

    public function logout()
    {

        if (auth()->guard('applicant')->check()) {
            auth()->guard('applicant')->logout();
        } elseif (auth()->guard('company')->check()) {
            auth()->guard('company')->logout();
        } else {
            auth()->guard('')->logout();
        }

        return redirect()->route('login');
    }


}
