<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\ApplicantJob;

class AnswerController extends Controller
{
    //

    public function store(Request $request)
    {
        $id = auth()->guard('applicant')->id();
        $answer = new Answer();
        $answer->fill($request->all());
        $answer->applicant_id = $id;

        if($answer->save()){

            $jobApplicant = new ApplicantJob();
            $jobApplicant->applicant_id = $id;
            $jobApplicant->job_id = $request->job_id;
            
            if($jobApplicant->save())
            {
            return redirect()->route('job-listing');
            }
        }
    }
}
