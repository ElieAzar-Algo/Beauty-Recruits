<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\FieldExpertise;



class JobController extends Controller
{
    
    public function create()
    {
        $categories = FieldExpertise::all();
        return view('front.post-job', compact('categories'));
    }


    public function post(Request $request)
    {
        // dd($request->all());
        $job = new Job();
        $job->fill($request->all());

        if($job->save())
        {
            redirect()->route('home');
        }
    }
}
