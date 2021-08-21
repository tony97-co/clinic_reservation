<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Interview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as time;
use Carbon\Carbon;
class InterviewController extends Controller
{
    /**
     * api for geting all intrviews based on auth user id for the report 
     *
     *
     */
    public function m(Request $request)
    {
        $interview = DB::table('interviews')->join('doctors',function($join){

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
             if($request->date){


                $to = time::today()->format('Y-m-d');
                $from;
                switch ($request->date){
                    case 'today':
                        $from = time::today()->format('Y-m-d');
                        // 19-10-2020
                        // 19-10-2020
                        break;
                    case 'yesterday':
                        $from = date('Y-m-d',strtotime("-1 days"));
                        // 18-10-2020
                        //19-10-2020
                        break;
                   
                    case 'month':
                        $from = time::today()->format('Y-m-1');
                        // 1-10-2020
                        //19-10-2020
                        break;  
                    case 'year':
                        $from = time::now()->subYears(1)->format('Y-m-d');
                        break;
                   
                    default:
                        $from = time::today()->format('Y-m-d');
                        break;
                }
                $interview = DB::table('interviews')->whereDate('date','>=',$from)->whereDate('date','<=',$to)->join('doctors',function($join){

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



             }
            
           return response()->json($interview);
      

    }

    /**
     * 
     *she all interviews for the auth clinic admin on dashbord sidenav
     * 
     */
    public function clinicInterviews()
    {
        
        
      $interview = DB::table('interviews')->join('doctors',function($join){

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
          $inters = Interview::all();
        return view('clinicAdmin.interviews')->with('interviews',$interview)->with('inters',$inters);
    }
  /**
     * return the blade for auth clinic interviews report the vue js responsepel for the content in this blade 
     *
     *
     */
    

    public function clinicInterviewsreport()
    {
        return view('clinicAdmin.reports.reservationReport');
    }
    /**
     * make the stutes of the interview pind 
     *
     *
     */
    

      public function pind($id){
        $interview = interview::find($id);
        $interview->state = 'pending';
        $interview->save();

     return redirect('/home');
    }
    public function show(Interview $interview)
    {
        return view('interviews.show')->with('interview',$interview);
    }

   
   
    public function edit(Interview $interview)
    {
        //
    }

   
    public function update(Request $request, Interview $interview)
    {
        //
    }

    
    public function destroy(Interview $interview)
    {
        //
    }
}
