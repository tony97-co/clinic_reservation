<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class ClinicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
     $clinic = Clinic::all();

     return view('clinics.index')->with('clinics',$clinic);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clinic = Clinic::all();
        return view('clinics.create' ,compact('clinic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user =  new User();
        $user->name =  $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'clinicAdmin';
         $user->save();


         $clinic = new Clinic();

        $clinic->clinic_name = $request->name ;
        $clinic->location = $request->location ;
        $clinic->phone = $request->phone ;
        $clinic->Address = $request->address ;
        $clinic->save();

        $user->clinics()->attach($clinic->id);
        return redirect('/clinics');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $clinic = Clinic::all();
        return view('clinics.show' ,compact('clinic'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

          $clinic=Clinic::findOrFail($id);

          return view('clinics.edit',compact('clinic'));

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
