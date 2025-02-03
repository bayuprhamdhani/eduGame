<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        return view('dashboard');
    }

    public function index2()
    {

        return view('dashboard2');
    }

    public function about()
    {

        return view('about');
    }

    public function contact()
    {

        return view('contact');
    }
}
