<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ApplicantValidator;


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
                    
                    return redirect()->route('waiting-verification');
                }
        }
        else
        {
            return redirect()->route('login'); 
        }
    }

    

    public function register(ApplicantValidator $request)
    {

        // dd($request->resume_pdf);
        $token = openssl_random_pseudo_bytes(16);

        //Convert the binary data into hexadecimal representation.
        //Cryptographic Token 
        $token = bin2hex($token);

        if($token)
        {
            $folderPath = public_path('storage/applicant-resumes');
            if (! File::exists($folderPath)) 
            {
                $response = mkdir($folderPath); 
            }

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
            
            'phone'=>$request->phone,
            'years_of_experience'=>$request->years_of_experience,
            'expertise_id'=>$request->expertise_id,
         ]);
            $date = date('Y-m-d-h-i-sa');

            $path = $request->file('resume_pdf')->storeAs('public/applicant-resumes','MyResume-'.$request->username.$date.'.pdf');
            $applicant->resume_pdf = $path;

            $photo = $request->file('photo')->storeAs('applicant-photos','MyPhoto-'.$request->username.$date.'.jpg','public');
            $applicant->photo = $photo;

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

            
            return redirect()->route('not-verified');
         }
         else
         {
            // $message = "Operation Failed";
            // return view('register', compact('message'));
            return response();
         }
        }
    }

        public function downloadResume($id)
        {
            $applicant = Applicant::find($id);
            // dd($applicant->resume_pdf);
            $path = $applicant->resume_pdf;

            return Storage::download($path);
        }
    

       public function show()
        {

            $id = auth()->guard('applicant')->id();
            
            $applicant = Applicant::where('id', $id)->with('field_expertise')->first();

            return view('front.applicantProfile', compact('applicant'));
        }

        public function index()
        {
            
            $data = Applicant::orderBy('created_at','DESC')
            ->with('field_expertise')
            ->paginate(10);
            return view('front.candidate-listing', compact('data'));
        
        }

        public function update(Request $request)
        {
            $id = auth()->guard('applicant')->id();

            $company = Applicant::find($id);

            if($company)
            {
                $company->update($request->all());
                if ($company->save())
                {
                    return redirect()->route('applicant-profile');
                }
                else
                {
                    return response()->json([
                        'success' => false,
                        'message' => "Operation Failed",
                    ], 404);
                }
            }
        }

    
}
