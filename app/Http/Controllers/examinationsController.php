<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\interview;
use App\Models\Examination;
use App\Models\Doctor;
use Session;
class examinationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

    $examination = new Examination();
$interview = interview::find($id);
    $examination->examination_name = $request->name;
    
  
    $examination->clinic_id = $interview->doctor->clinic_id ;
    $examination->interview_id = $interview->id; 
    $examination->save();
    return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $examination = Examination::find($id);

        return view('Examinations.show')->with('examination',$examination);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $examination = Examination::find($id);
        return view('Examinations.edit')->with('examination',$examination);
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pindExamination($id)
    {
        $examination = Examination::find($id);
        $examination->state = 'pending';
        $examination->save();

        return redirect('/home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $examination = Examination::find($id);
        if( $request->hasfile('result'))
        {
        $file = $request->file('result');
        $ext = $file->getClientOriginalExtension() ;
        $filename = 'image' . '_' . time() . '.' . $ext ;
        $file->storeAs('public/results' ,$filename); 
        $examination->result = $filename;
        $examination->state = 'finish';

       }
       $examination->update();
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $examination = Examination::find($id);
        $examination->delete();
        return redirect()->back();
    }
    public function clinicAdminExaminations(){
    $clinic_id = Auth()->user()->clinics()->pluck('clinics.id');
   $id = $clinic_id[0];

   $examinations  = Examination::where('clinic_id', $id)->get();
        return view('clinicAdmin.examinations')->with('examinations',$examinations);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function resultShow($id)
    {
        $examination = Examination::find($id);
        return view('doctorDashbord.resualt')->with('examination',$examination);
    }
}
