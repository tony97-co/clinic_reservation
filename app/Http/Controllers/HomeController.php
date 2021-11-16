<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Interview;
use App\Models\Examination;
use App\Models\Clinic;
use App\Models\Patient;
use App\Models\Specialist;
use App\Models\User;
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





            //today interviews
            $today = time::today()->format('Y-m-d');
            $interviews = DB::table('interviews')->whereDate('date','=',$today)->join('doctors',function($join){

                $clinic_id = Auth()->user()->clinics()->pluck('clinics.id');
                $id = $clinic_id[0];
                 $join->on('interviews.doctor_id','=','doctors.id')->join('users',function($join)
                 {
                  $join->on('doctors.user_id','=','users.id');   
                    }
           )->join('specialists',function($join){
               $join->on('doctors.specialist_id','=','specialists.id');
           }
           )->where('doctors.clinic_id','=',$id);
                 })->join('patients',function($join){
                   $join->on('interviews.patient_id','=','patients.id');
                 })->select('interviews.*','specialists.specalty_name','users.user_name','patients.patient_name')->get();

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
            ->with('clinicExams',$clinicExams)
            ->with('interviews',$interviews);
        }
        if (auth()->user()->IsSuperAdmin()) {
            $today = time::today()->format('Y-m-d');
            $todayInterviews = Interview::whereDate('date','=',$today)->get();
            $SnewCount = Interview::where('state','notstarted')->count();
            $finshedCount = Interview::where('state','finished')->count();
            $pindedCount = Interview::where('state','pending')->count();
            $examinationcount =Examination::all()->count();
            $clinics =Clinic::all()->count();
            $DoctorsCount = Doctor::all()->count();
            $users = User::all()->count();
            $interviewsCount = Interview::all()->count();
            $lapdoctors = User::where('role','lapdoctor')->count();
             $Patients = Patient::all()->count();
          $Specialist = Specialist::all()->count();
            return view('superAdmin.home')
            ->with('finshedCount',$finshedCount)
            ->with('todayInterviews',$todayInterviews)
            ->with('SnewCount',$SnewCount)
            ->with('pindedCount',$pindedCount)
             ->with('examinationcount',$examinationcount)
             ->with('clinics',$clinics)
             ->with('DoctorsCount',$DoctorsCount)
             ->with('users',$users)
             ->with('interviewsCount',$interviewsCount)
             ->with('lapdoctors',$lapdoctors)
             ->with('Patients',$Patients)
             ->with('Specialist',$Specialist)
             ->with('Specialist',$Specialist);
             
        }
        if (auth()->user()->lap_doctor()) {


            $clinic_id = Auth()->user()->clinics()->pluck('clinics.id');
            $id = $clinic_id[0];
            //allexams
            $examinations = Examination::where('clinic_id','=',$id)->get();
            //allcount
            $examinationcount = Examination::where('clinic_id','=',$id)->count();
            //new count 
            $newExamination = Examination::where('state','=','notstart')->where('clinic_id','=',$id)->count();
            //pindeing count
            $pindingExamination = Examination::where('state','=','pending')->where('clinic_id','=',$id)->count();
            //finshed count
            $finshesdExamination = Examination::where('state','=','finish')->where('clinic_id','=',$id)->count();
            return view('lapdoctors.dashbord.home')->with('examinationcount',$examinationcount)
            ->with('newExamination',$newExamination)
            ->with('pindingExamination',$pindingExamination)
            ->with('finshesdExamination',$finshesdExamination)
            ->with('examinations',$examinations)
            ;
        }
    }
}
