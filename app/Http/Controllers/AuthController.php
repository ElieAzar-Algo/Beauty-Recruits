<?php

namespace App\Http\Controllers;

use App\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\FieldExpertise;

class AuthController extends Controller
{

    public function indexLogin()
    {
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
        return redirect()->route('reset')->with('failed_login', 'Password reset link is expired');
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
