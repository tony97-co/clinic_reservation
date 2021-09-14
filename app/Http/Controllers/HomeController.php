<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Interview;
use App\Models\Examination;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as time;
use Carbon\Carbon;
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
        //************************************************ */
        if(auth()->user()->isdoctor()) {
            $id = Auth()->user()->doctor()->pluck('doctors.id');

            $doctor_id = $id[0];




            $newCount = Interview::where('doctor_id',$doctor_id)->where('state','notstarted')->count();
            $finshedCount = Interview::where('doctor_id',$doctor_id)->where('state','finished')->count();
            $pindedCount = Interview::where('doctor_id',$doctor_id)->where('state','pending')->count();
            $allCount = Interview::where('doctor_id',$doctor_id)->count();
            $time = time::today()->format('Y-m-d');
            $todayInterviews = Interview::where('doctor_id',$doctor_id)->where('state','notstarted')->whereDate('date','=',$time)->get();
            return view('doctorDashbord.home')
            ->with('newCount',$newCount)
            ->with('finshedCount',$finshedCount)
            ->with('pindedCount',$pindedCount)
            ->with('allCount',$allCount)
            ->with('todayInterviews',$todayInterviews);
        }
//*********************************************************************************** */
        if (auth()->user()->IsClinicAdmin()) {

            //total interviews count
            $interviewsClinicCount = DB::table('interviews')->join('doctors',function($join){

                $clinic_id = Auth()->user()->clinics()->pluck('clinics.id');
                $id = $clinic_id[0];
                 $join->on('interviews.doctor_id','=','doctors.id')->where('doctors.clinic_id','=',$id);
            })->count();
            //new interviews count
            $newInterviewsClinicCount = DB::table('interviews')->join('doctors',function($join){

                $clinic_id = Auth()->user()->clinics()->pluck('clinics.id');
                $id = $clinic_id[0];
                 $join->on('interviews.doctor_id','=','doctors.id')->where('doctors.clinic_id','=',$id);
              })->where('interviews.state','=','notstarted')->count();
            //new interviews count
               $fineshedInterviewsClinicCount = DB::table('interviews')->join('doctors',function($join){

                $clinic_id = Auth()->user()->clinics()->pluck('clinics.id');
                $id = $clinic_id[0];
                 $join->on('interviews.doctor_id','=','doctors.id')->where('doctors.clinic_id','=',$id);
                })->where('interviews.state','=','finished')->count();
            //new interviews count
              $pindeingInterviewsClinicCount = DB::table('interviews')->join('doctors',function($join){

               $clinic_id = Auth()->user()->clinics()->pluck('clinics.id');
               $id = $clinic_id[0];
               $join->on('interviews.doctor_id','=','doctors.id')->where('doctors.clinic_id','=',$id);
                })->where('interviews.state','=','pending')->count();
            //doctors counts
             $clinic_id = Auth()->user()->clinics()->pluck('clinics.id');
                  $id = $clinic_id[0];
              $clinicDoctorsCount = Doctor::where('clinic_id','=',$id)->count();
           //lapdoctors count
           $clinicLapCount = '8';
          //clinic Examinations count
            $clinicExams =Examination::where('clinic_id','=',$id)->count();
          //************************** */
            return view('clinicAdmin.home')->with('interviewsClinicCount',$interviewsClinicCount)
            ->with('newInterviewsClinicCount',$newInterviewsClinicCount)
            ->with('fineshedInterviewsClinicCount',$fineshedInterviewsClinicCount)
            ->with('pindeingInterviewsClinicCount',$pindeingInterviewsClinicCount)
            ->with('clinicDoctorsCount',$clinicDoctorsCount)
            ->with('clinicLapCount',$clinicLapCount)
            ->with('clinicExams',$clinicExams);
        }
        if (auth()->user()->IsSuperAdmin()) {
            return view('superAdmin.home');
        }
        if (auth()->user()->lap_doctor()) {
            return view('lapdoctors.dashbord.home');
        }
    }
}
