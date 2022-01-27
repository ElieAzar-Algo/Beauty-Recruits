<?php

namespace App\Http\Controllers;

use App\Applicant;
use Illuminate\Http\Request;
use App\Job;
use App\FieldExpertise;



class JobController extends Controller
{



    public function index()

    {

        if(request()->has('search'))
        {
            // dd(request('search'));
            $data = Job::where('job_title','LIKE',request('search').'%')
            ->orderBy('created_at','DESC')
            ->with('company')
            ->with('field_expertise')
            ->paginate(4)
            ->appends('search', request('search'));
            return view('front.job-listing', compact('data'));
        }
        else
        {
            $data = Job::with('company')
            ->orderBy('created_at','DESC')
            ->with('field_expertise')
                ->where('time_frame', '>=', date('Y-m-d'))
            ->paginate(4);
            return view('front.job-listing', compact('data'));
        }

    }

    public function getCandidate($id)
    {
        $indicator = 0;
        $data = Applicant::where('id', $id)->first();
//        $data = Job::where('id',$id)
//        ->with('company')
//        ->with('field_expertise')
//        ->with('applicant')
//        ->first();
//

        return view('front.candidate-job-details', compact('data'));
    }

    public function show($id)
    {
        $indicator = 0;
        $data = Job::where('id',$id)
        ->with('company')
        ->with('field_expertise')
        ->with('applicant')
        ->first();



        foreach($data->applicant as $app)
        {

            if($app->pivot->applicant_id == auth()->guard('applicant')->id())
            {
                $indicator = 1;
            }
        }

        return view('front.job-details', compact('data','indicator'));
    }

    public function create()
    {
        $categories = FieldExpertise::all();
        return view('front.post-job', compact('categories'));
    }


    public function post(Request $request)
    {
        // dd($request->all());
        $time_frame = date("Y-m-d", strtotime($request->time_frame));
        $date_posted = date("Y-m-d", strtotime($request->date_posted));
        // dd($time_frame." - - - ".$date_posted);
        $job = new Job();
        $job->fill([
            'company_id' => $request->company_id,
            'job_title' => $request->job_title,
            'salary' => $request->salary,
            'job_description' => $request->job_description,
            'years_of_experience' => $request->years_of_experience,
            'expertise_id' => $request->expertise_id,
            'question'=> $request->question,
            'job_type' => $request->job_type,
            'time_frame' => $time_frame,
            'date_posted' => $date_posted,
        ]);

        if($job->save())
        {
            return redirect()->route('home');
        }
    }
}
