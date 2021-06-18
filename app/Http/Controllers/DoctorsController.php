<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

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
        // dd($doctor);
        return view('doctors.create' ,compact('doctor'));
    }

    public function store(Request $request)
    {
        $request->validate([

                'about' => 'required|unique:about|max:255',
                // 'name' =>  'required|max:20',
                'price' =>  'required|max:5',
                'carrier' =>  'required|max:50'
        ]);
           $doctor = new Doctor();

        //    dd($doctor);

            // $doctor->name      = $request->name;
            $doctor->carrier          = $request->carrier;
            $doctor->price        = $request->price;
            $doctor->birth          = $request->birth;
            $doctor->degree          = $request->degree;
            $doctor->about          = $request->about;
            $doctor->save();
            dd($doctor);

            return redirect()->route('doctors.show')
            ->with('success','Doctor created successfully.');

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
