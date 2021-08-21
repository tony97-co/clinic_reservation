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
    public function index()

    {
        if(auth()->user()->isdoctor()) {

            return view('doctorDashbord.home');
        }

        if (auth()->user()->IsClinicAdmin()) {
            return view('clinicAdmin.home');
        }
        if (auth()->user()->IsSuperAdmin()) {
            return view('superAdmin.home');
        }
        
    }
}
