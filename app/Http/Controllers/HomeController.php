<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //  user
    public function index()
    {
        return view('home');
    }

    // admin
    public function adminHome()
    {
        return view('adminHome');
    }

    // manager
    public function managerHome()
    {
        return view('managerHome');
    }
}
