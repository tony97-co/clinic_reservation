<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class lapDoctorsController extends Controller
{
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
        $lapdoctor = new User();
        $lapdoctor->user_name = $request->name;
        $lapdoctor->email = $request->email;
        $lapdoctor->phone = $request->phone;
        $lapdoctor->qualifications = $request->qualifications;
        $lapdoctor->address = $request->Address;
        $lapdoctor->password = Hash::make($request->password);
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
        //
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
        //
    }
}
