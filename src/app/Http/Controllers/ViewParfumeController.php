<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewParfumeController extends Controller
{
    public function index()
    {
        return view('my_parfume');
    }
}
