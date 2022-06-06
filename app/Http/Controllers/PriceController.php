<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Applicant;
use Illuminate\Http\Request;
use App\Job;
use App\Subscription;
use App\FieldExpertise;
use App\SubscriptionUser;
use Carbon\Carbon;

class PriceController extends Controller
{


    public function index()

    {

        $data = Subscription::get();
        return view('front.price-listing', compact('data'));
    }


    public function subscriptionRequest(Request $request)
    {
        $date = Carbon::now();
        $result = 'You are already subscribed ! You can register in new plans when your current plan expires!';

        $subscription = Subscription::findOrFail($request->subscription);
        SubscriptionUser::where('success', '=', 0)->delete();
        $subscriptionUser = SubscriptionUser::where('user_id', '=', auth()->user()->id)->whereDate('end_date', '>', $date)->first();

        $isUserFinishViewCvs = $subscription->download_cv == $subscriptionUser->viewed_cv;
        if ($isUserFinishViewCvs) {
            $subscriptionUser->end_date = $date;
            $subscriptionUser->save();
        }
        if ($subscriptionUser || $isUserFinishViewCvs) {

            $subscriptionUserInsert = new SubscriptionUser();
            $subscriptionUserInsert->fill([
                'user_id' => auth()->user()->id,
                'subscription_id' => $subscription->id,
                'end_date' => $date->addDays($subscription->days),
            ]);

            $subscriptionUserInsert->save();
            return view('front.stripe');

        }
        return view('front.companyDashboard', compact('result'));


    }

    public function getCandidate($id, $job_id)
    {
        $indicator = 0;
        $job = Job::where('id', $job_id)
            ->with('company')
            ->with('field_expertise')
            ->with('applicant')
            ->first();
        $question = $job->question;
        $applicantAnswer = $answer = Answer::
        where('applicant_id', $id)
            ->where('job_id', $job_id)
            ->first();
        $answer = $applicantAnswer->answer;
        $data = Applicant::where('id', $id)->first();
//        $data = Job::where('id',$id)
//        ->with('company')
//        ->with('field_expertise')
//        ->with('applicant')
//        ->first();
//

        return view('front.candidate-job-details', compact('data', 'question', 'answer'));
    }

    public function show($id)
    {
        $indicator = 0;
        $data = Job::where('id', $id)
            ->with('company')
            ->with('field_expertise')
            ->with('applicant')
            ->first();


        foreach ($data->applicant as $app) {

            if ($app->pivot->applicant_id == auth()->guard('applicant')->id()) {
                $indicator = 1;
            }
        }

        return view('front.job-details', compact('data', 'indicator'));
    }

    public function create()
    {
        $categories = FieldExpertise::all();
        return view('front.post-job', compact('categories'));
    }

    public function jobDelete($id)
    {
        $data = Job::where('id', $id)->delete();

        return $this->index();
    }

    public function jobEdit($id)
    {
        $categories = FieldExpertise::all();
        $data = Job::where('id', $id)
            ->with('company')
            ->with('field_expertise')
            ->with('applicant')
            ->first();
        return view('front.update-job', compact('data', 'categories'));
    }

    public function jobUpdate(Request $request)
    {

        $time_frame = date("Y-m-d", strtotime($request->time_frame));
        $date_posted = date("Y-m-d", strtotime($request->date_posted));
        // dd($time_frame." - - - ".$date_posted);

        $job = Job::where('id', $request->id)
            ->with('company')
            ->with('field_expertise')
            ->with('applicant')
            ->first();

        $job->company_id = $request->company_id;
        $job->job_title = $request->job_title;
        $job->salary = $request->salary;
        $job->job_description = $request->job_description;
        $job->years_of_experience = $request->years_of_experience;
        $job->expertise_id = $request->expertise_id;
        $job->question = $request->question;
        $job->job_type = $request->job_type;
        $job->time_frame = $time_frame;
//'date_posted' => $date_posted,

        if ($job->save()) {

            return redirect()->route('job-edit', ['id' => $job->id]);
        }
    }

    public function post(Request $request)
    {
//         dd($request->all());
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
            'question' => $request->question,
            'job_type' => $request->job_type,
            'time_frame' => $time_frame,
            'date_posted' => $date_posted,
        ]);

        if ($job->save()) {
            return redirect()->route('home');
        }
    }
}
