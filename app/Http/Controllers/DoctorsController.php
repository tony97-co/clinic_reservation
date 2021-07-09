<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Clinic;
use App\Models\Doctor;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;
use App\Models\Work_time;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
    {
        $doctor = Doctor::latest()->paginate(5);

        return view('doctors.index',compact('doctor'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
        $user->name =  $request->name;
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
         return view('home');



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

          $doctor=Doctor::findOrFail($id);

          return view('doctors.edit',compact('doctor'));

        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctors $doctors)
    {

           $doctor = new Doctor();
            $doctor->name      = $request->docname;
            $doctor->carrier          = $request->doccarrier;
            $doctor->price        = $request->docprice;
            $doctor->birth          = $request->docbirth;
            $doctor->degree          = $request->docdegree;
            $doctor->about          = $request->docabout;
            $doctor->save();

             return redirect('/doctors/show')->with('status','Doctor has been updated');
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
}
