<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Job;
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
        $myJobs = Job::where('company_id', $id)->get();

        return view('front.companyProfile', compact('company','myJobs'));
    }

    public function update(Request $request)
    {
        $id = auth()->guard('company')->id();

        $company = Company::find($id);

        if($company)
        {
         $company->update($request->all());
         if ($company->save())
         {
            return redirect()->route('company-profile');
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

    public function index()
    {
        if(request()->has('letter'))
        {
            $data = Company::where('name',"LIKE", request('experience'),"%")
            ->orderBy('created_at','DESC')
            ->with('job')
            ->with('field_expertise')
            ->paginate(10)
            ->appends('letter', request('letter'));
            return view('front.company-listing', compact('data'));
        }
        else 
        {
            $data = Company::with('job')
            ->orderBy('created_at','DESC')
            ->with('field_expertise')
            ->paginate(10);
        

            return view('front.company-listing', compact('data'));
        }

    }
    
}
