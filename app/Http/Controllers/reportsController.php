<?php

namespace App\Http\Controllers;
use App\Models\Clinic;
use App\Models\Interview;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as time;
use Carbon\Carbon;
use Session;
class reportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //super admain reports
    //**************************************************************** */
    //the blade for the report
    public function interviews(){

         $interviews = Interview::all();
        
        return view('superAdmin.reports.interviews')->with('interviews',$interviews);
    }

public function clinics()
    {
   $clinics = Clinic::all();
   foreach($clinics as $clinic){

    $GLOBALS["clinic_id"] = $clinic->id;
    $clinic->interviewsCount =  DB::table('interviews')->join('doctors',function($join){
 
     
      $join->on('interviews.doctor_id','=','doctors.id')->where('doctors.clinic_id','=', $GLOBALS["clinic_id"]);
     })->count();
   }
   return view('superAdmin.reports.clinics')->with('clinics',$clinics);
  
   }
   public function patients(){
    $patients = Patient::all();
    foreach($patients as $patient){
        $GLOBALS["idd"] = $patient->id;
        $patient->examinationsCount =  DB::table('examinations')->join('interviews',function($join,)
        {

          
           $join->on('examinations.interview_id','=','interviews.id')
     ->where('interviews.patient_id','=',$GLOBALS["idd"]);
           }
           )->count();

    }
    return view('superAdmin.reports.pitants')->with('patients',$patients);
   }
   public function doctors(){

       $doctors = Doctor::all();
       return view('superAdmin.reports.doctors')->with('doctors',$doctors);

   }
}
