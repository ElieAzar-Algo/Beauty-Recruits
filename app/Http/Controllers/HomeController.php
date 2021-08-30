<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use Illuminate\Support\Facades\Log;


class HomeController extends Controller
{
    public function index()
    {
         Log::info("herrr");
        $data = Job::with('company')
            ->orderBy('created_at','DESC')
            ->with('field_expertise')
            ->take(10)
            ->get();
            // Log::info($data->field_Expertise);
            return view('front.home', compact('data'));

    }
}
