<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Jobs;
use Illuminate\Support\Facades\Validator;

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
    public function index()
    {
        $jobs = Jobs::get();
        return view("home", compact('jobs'));
    }
}
