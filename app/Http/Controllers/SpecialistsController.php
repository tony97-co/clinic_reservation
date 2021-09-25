<?php

namespace App\Http\Controllers;

use App\Models\Specialist;
use Illuminate\Http\Request;
use App\Models\clinic;
use Session;
class SpecialistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $Specialists = Specialist::all();
       return view('specialties.index')->with('Specialists',$Specialists);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        return view('specialties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //val
    $this->validate($request , array(
        'name'           => 'required|max:255|unique:specialists,specalty_name',
       'Description'      => 'required|max:255',
        
      
   
     ));

        $Specialists = new Specialist();
        $Specialists->specalty_name = $request->name;
        $Specialists->des = $request->Description;
        $Specialists->save();
        Session::flash('SUCCESS','DONE ADD NEW SPECIALTY !');
        return redirect('/specialties');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialists  $specialists
     * @return \Illuminate\Http\Response
     */
    public function show(Specialists $specialists)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialists  $specialists
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialists $specialists)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialists  $specialists
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specialists $specialists)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialists  $specialists
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Specialists = Specialist::find($id);
        if ($Specialists->doctor->count() <= 0 ) {
            $Specialists->delete();

            Session::flash('SUCCESS','SPECIALTY DELETED !');
        } else {
            Session::flash('error',' CAN NOT DELETE THIS SPECIALTY!');
        }
        
        return redirect('/specialties');
        
    }
}
