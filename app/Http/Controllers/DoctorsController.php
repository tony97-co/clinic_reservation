<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Specialist;
use App\Models\Interview;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;
use App\Models\Work_time;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        public function index(){
  //doctor in the auth clinic
      
            $clinic_id = Auth()->user()->clinics()->pluck('clinics.id');
            $id = $clinic_id[0];
        
            $doctor = Doctor::where('clinic_id', $id)->get();
         
                  
        return view('doctors.index')->with('doctors',$doctor);
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctor = Doctor::all();
        return view('doctors.create' ,compact('doctor'));
    }

    public function store(Request $request)
    {
        $user =  new User();
        $user->user_name =  $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'doctor';
         $user->save();

           $doctor = new Doctor();
           $doctor->birth = $request->birth;
           $doctor->phone = $request->phone;
           $doctor->address = $request->address;
           $doctor->qualifications = $request->qualifications;  
           $doctor->price = $request->diagnosis_prise;
           $doctor->specialist_id = 1;
           if( $request->hasfile('image')){
            $file = $request->file('image');
            
            $ext = $file->getClientOriginalExtension() ;
            $filename = 'image' . '_' . time() . '.' . $ext ;
            $file->storeAs('public/doctors' ,$filename); 
            $doctor->image = $filename;
           }
         
           $doctor->user_id = $user->id;
           $clinic_id = Auth()->user()->clinics()->pluck('clinics.id');
           $doctor->clinic_id = $clinic_id[0];
            $doctor->save();
           
      for($i = 0;$i < 7;$i++)
      {                      
        if($request->frome[$i] === null)
           {
            $a = $i;
          }else
             {
                  

             $work_time = new Work_time();
             $work_time->from  = $request->frome[$i];
             $work_time->to  = $request->to[$i];
             $work_time->day  = $request->day[$i];
             $work_time->doctor_id  =  $doctor->id;
                $work_time->save();
              }   
            }
           
         
                  
        return view('doctors.index')->with('doctors',$doctors);
            



            // return redirect()->route('doctors.show')
            // ->with('success','Doctor created successfully.');

   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $doctor = Doctor::all();
        return view('doctors.show' ,compact('doctor'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

          $doctor= Doctor::findOrFail($id);
         $specialties = Specialist::all();
          return view('doctors.edit')->with('specialties',$specialties)->with('doctor',$doctor);

        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $doctor = Doctor::find($id);

        $user = User::find($doctor->user_id);
        $user->user_name =  $request->name;
        $user->email = $request->email;
        if($request->password)
        {
            $user->password = Hash::make($request->password);
        }
        $user->update();

            $doctor->birth = $request->birth;
            $doctor->phone = $request->phone;
            $doctor->address = $request->address;
            $doctor->qualifications = $request->qualifications;  
            $doctor->price = $request->diagnosis_prise;
            $doctor->specialist_id = 1;
            if( $request->hasfile('image'))
            {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension() ;
            $filename = 'image' . '_' . time() . '.' . $ext ;
            $file->storeAs('public/doctors' ,$filename); 
            $doctor->image = $filename;
           }
           $doctor->update();
           $work_times = Work_time::where('doctor_id',$doctor->id);  
           
      for($i = 0;$i < 7;$i++)
      {                      
          if($request->frome[$i] !== null)
          
            {  
                 
                   foreach($work_times as $work_time)
                     { 
                       if($request->day[$i] ===  $work_time->day ) 
                          {
                            $work_time->from  = $request->frome[$i];
                           $work_time->to  = $request->to[$i];
                           $work_time->update();
                           }
                     }
             $work_tim = new Work_time();
             $work_tim->from  = $request->frome[$i];
             $work_tim->to  = $request->to[$i];
             $work_tim->day  = $request->day[$i];
             $work_tim->doctor_id  =  $doctor->id;
                $work_tim->save();

              }

       }
        return redirect('/doctors');
    }









      
           
             
     

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor ->delete();
        return redirect()->route('doctors.show')->with('status','Doctor has been deleted');
    }
    public function newInterviews($id){
 
      $doctor = Doctor::where('user_id', $id)->get();
      $i = $doctor[0]->id;
      
      $interviews = Interview::where('doctor_id', $i)->where('state','notstarted')->get();
      
      return view('doctorDashbord.newInterview')->with('interviews',$interviews);
    }
    public function pinnededInterviewa($id){
 
      $doctor = Doctor::where('user_id', $id)->get();
      $i = $doctor[0]->id;
      
      $interviews = Interview::where('doctor_id', $i)->where('state','pending')->get();
      
      return view('doctorDashbord.pindingInterviewa')->with('interviews',$interviews);
    }
}
