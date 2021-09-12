<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interview;
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
            $id = Auth()->user()->doctor()->pluck('doctors.id');

            $doctor_id = $id[0];
            $newCount = Interview::where('doctor_id',$doctor_id)->where('state','notstarted')->count();
            $finshedCount = Interview::where('doctor_id',$doctor_id)->where('state','finished')->count();
            $pindedCount = Interview::where('doctor_id',$doctor_id)->where('state','pending')->count();
            $allCount = Interview::where('doctor_id',$doctor_id)->count();
            return view('doctorDashbord.home')->with('newCount',$newCount)->with('finshedCount',$finshedCount)->with('pindedCount',$pindedCount)->with('allCount',$allCount);
        }

        if (auth()->user()->IsClinicAdmin()) {

            return view('clinicAdmin.home');
        }
        if (auth()->user()->IsSuperAdmin()) {
            return view('superAdmin.home');
        }
        if (auth()->user()->lap_doctor()) {
            return view('lapdoctors.dashbord.home');
        }
    }
}
