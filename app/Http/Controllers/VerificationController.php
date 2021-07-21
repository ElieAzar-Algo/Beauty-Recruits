<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use Mail;

class VerificationController extends Controller
{
    public function indexApplicant ($id, $email, $token)
    {

        
        $applicant = Applicant::where('id',$id)->first();
        
        if($applicant->token == $token && $applicant->email == $email && $applicant->email_verification == 0 )
        {
            // dd('yes');
            $applicant->email_verification = 1;
            $applicant->save();

            $mailData = array(
                'message' => 'Your email has been verified. Your account is now active.',
                'sub_message' => 'Please use the link below to be redirected to your account',
                'name' => $applicant->full_name,
            );
    
            Mail::send('mail.verifiedEmail', ["data" => $mailData], function($message) use ($applicant)
            {
                $message->from(config('mail.from_email'),'Beauty Recruits Verified');
                $message->to($applicant->email, $applicant->full_name)->subject('Beauty Recruits Email Verified');
                
            });

             return redirect()->route('waiting-verification');
        }
    } 
}
