<?php

namespace App\Http\Controllers\api;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Http\Resources\doctorResource;

class doctorsController extends Controller
{
    public function byClinicAndSspecialist($clinic,$specialist){
        $doctors = DB::table('doctors')->where([
            ['clinic_id','=',$clinic],
            ['specialist_id','=',$specialist],
        ])->get();
        if($doctors == null)
                return response()->json([
                  'error'=> true,
                  'message'=>'there is no doctors' ,  
                  'code'=> 1  ],
                    404);
              else{
                 
                
                return response()->json([
                'error'=>false,
                'message'=>'all doctors in this clinic and this specialist',
                'data'=>$doctors],200);
              }
        }
       public function show($id){

         $doctor = Doctor::find($id);
       return new doctorResource($doctor);
       
       }
       public function search(){
         $name = 'maca';
      
      $interview = DB::table('clinics')->where('name', $name)->get();
      dd($interview);
       }
}  
