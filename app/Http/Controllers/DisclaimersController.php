<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisclaimersController extends Controller
{
    public function index ()
    {
        return view('front.disclaimers');
    }
}
