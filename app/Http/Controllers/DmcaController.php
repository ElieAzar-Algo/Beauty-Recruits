<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DmcaController extends Controller
{
    public function index ()
    {
        return view('front.dmca');
    }
}
