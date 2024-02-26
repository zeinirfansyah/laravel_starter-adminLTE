<?php

namespace App\Http\Controllers;

use App\Models\User;
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
     * Show the application admin.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //  user
    public function index()
    {
        $user = auth()->user();
        return view('welcome', compact('user'));
    }

    // admin
    public function adminHome()
    {
        return view('admin.adminHome');
    }

    // manager
}
