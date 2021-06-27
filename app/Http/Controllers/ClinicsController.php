<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\User;
use Illuminate\Http\Request;

class ClinicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $request->validate([

                'clinic_name' => 'required|unique:clinics',
                'location' =>  'required',
                'email' =>  'required|unique:users',
                'passsword' =>  'required|max:50'
        ]);
           $clinic = new Clinic();
        //    $doctor->user_id = auth()->user()->id;
            // $doctor->name      = $request->name;
            $clinic->clinic_name          = $request->clinic_name;
            $clinic->location        = $request->location;
            $clinic->birth          = $request->birth;
            $clinic->phone          = $request->phone;
            $clinic->about          = $request->about;

            $user = new User();
            $user->name          = $request->name;
            $user->email        = $request->location;
            $user->password          = $request->birth;
            $user->role = 'superAdmin';
            $user->save();

            $user->clinic()->attach($clinic->$id);
            return redirect('/doctors/show')->with('status','تم إدخال البيانات ');

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
