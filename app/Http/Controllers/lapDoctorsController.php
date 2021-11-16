<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Clinic;
use App\Models\Examination;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Hash;
class lapDoctorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinic_id = Auth()->user()->clinics()->pluck('clinics.id');
        $id = $clinic_id[0];
        $clinic = Clinic::find($id);
 
    return view('lapdoctors.index')->with('clinic',$clinic);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('lapdoctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , array(





         
            'address'           => 'required',
            'qualifications'           => 'required',
            'name'           => 'required|max:255',
            'email'          =>'required|max:255|email|unique:users',
           
          
       
         ));
                   
        $lapdoctor = new User();
        $lapdoctor->user_name = $request->name;
        $lapdoctor->email = $request->email;
        $lapdoctor->phone = $request->phone;
        $lapdoctor->qualifications = $request->qualifications;
        $lapdoctor->address = $request->address;
        $lapdoctor->password = Hash::make($request->Password);
        if( $request->hasfile('image')){
            $file = $request->file('image');
            
            $ext = $file->getClientOriginalExtension() ;
            $filename = 'image' . '_' . time() . '.' . $ext ;
            $file->storeAs('public/image' ,$filename); 
            $lapdoctor->image = $filename;
             }else{
                 dd($request->all());
             }
            
        $lapdoctor->role = 'lapDoctor';
        $lapdoctor->save();
        $clinic_id = Auth()->user()->clinics()->pluck('clinics.id');
        $id = $clinic_id[0];
        $lapdoctor->clinics()->attach($id);
        Session::flash('SUCCESS','DONE ADD NEW LAPDOCTOR !');
        return redirect('/lapDoctors');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lapdoctor = User::find($id);

        return view('lapdoctors.create')->with('lapdoctor',$lapdoctor);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lapdoctor = User::find($id);
        $lapdoctor->clinics()->detach();
        Session::flash('SUCCESS','LAPDOCTOR DELETED !');
        return redirect('/lapDoctors');
    }
     /**
     * الفحوصات الجديدة حسب طبيب المعمل 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function newExaminations()
    {
        $clinic_id = Auth()->user()->clinics()->pluck('clinics.id');
        $id = $clinic_id[0];
        $examination = Examination::where('state','=','notstart')->where('clinic_id','=',$id)->get();

        return view('lapdoctors.dashbord.newExaminations')->with('examinations',$examination);
    }
    /**
     * الفحوصات المجمدة حسب طبيب المعمل 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pindedExaminations()
    {
        $clinic_id = Auth()->user()->clinics()->pluck('clinics.id');
        $id = $clinic_id[0];
        $examination = Examination::where('state','=','pending')->where('clinic_id','=',$id)->get();

        return view('lapdoctors.dashbord.newExaminations')->with('examinations',$examination);
    }
      /**
     * الفحوصات المجمدة حسب طبيب المعمل 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function finshedExaminations()
    {
        $clinic_id = Auth()->user()->clinics()->pluck('clinics.id');
        $id = $clinic_id[0];
        $examination = Examination::where('state','=','finish')->where('clinic_id','=',$id)->get();

        return view('lapdoctors.dashbord.finshedExaminations')->with('examinations',$examination);
    }
}
