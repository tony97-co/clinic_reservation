<?php

namespace App\Http\Controllers;
use App\Http\Resources\doctorResource;
use App\Models\Clinic;
use App\Models\User;
use App\Models\Doctor;
use App\Models\interview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as time;
use Carbon\Carbon;
use Session;
class ClinicsController extends Controller
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

        //val
    $this->validate($request , array(





        'email'          =>'required|max:255|email|unique:users',
        
      
   
        ));

        $user =  new User();
        $user->user_name =  $request->name;
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
        Session::flash('SUCCESS','DONE ADD NEW CLINIC !');
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
        
        $clinic= Clinic::findOrFail($id);
        if ($clinic->doctors->count() <= 0) {
            foreach ($clinic->users as $userId) {
            $user = User::find($userId->id);
            $user->clinics()->detach();
            $user->delete();
            }
            
            $clinic->delete();
            Session::flash('SUCCESS',' CLINIC DELEDTED !');
        }else{
            Session::flash('error',' CAN NOT DELETE THIS CLINIC!');
        }
  
        
        return redirect('/clinics');
    }
     /**
     * the blade for doctors reports
     *
    
     */
    public function clinicDoctorsReport()
    {
        return view('clinicAdmin.reports.doctorsReport');
    }
     /**
     * the api for doctors in vue js report 
     *
    
     */
  
public function s(Request $request){

    $clinic_id = Auth()->user()->clinics()->pluck('clinics.id');
    $id = $clinic_id[0];
    $doctors = Doctor::with('user','specialist')->where('clinic_id','=',$id)->get();
    foreach($doctors as $doctor)
           {
     $doctor->start_date =    $doctor->created_at->diffForHumans();  
     $i = $doctor->id;
     $interviews_count = interview::where('doctor_id',$i)->count();
     $doctor->interview_count = $interviews_count;
   
    }
   
     
   if($request->date){

    $to = time::today()->format('Y-m-d');
    $from ;
   switch ($request->date){
                    case 'today':
                        $from = time::today()->format('Y-m-d');
                        // 19-10-2020
                        // 19-10-2020
                        break;
                    case 'yesterday':
                        $from = date('Y-m-d',strtotime("-1 days"));
                        // 18-10-2020
                        //19-10-2020
                        break;
                   
                    case 'month':
                        $from = time::today()->format('Y-m-1');
                        // 1-10-2020
                        //19-10-2020
                        break;  
                    case 'year':
                        $from = time::now()->subYears(1)->format('Y-m-d');
                        break;
                   
                    default:
                        $from = time::today()->format('Y-m-d');
                        break;
                }
  
   $doctors = Doctor::with('user')->where('clinic_id','=',$id)->get();
    foreach($doctors as $doctor)
           {
            $doctor->start_date =    $doctor->created_at->diffForHumans();  
     $i = $doctor->id;
     $interviews_count = interview::where('doctor_id',$i)->whereDate('date','>=', $from)->whereDate('date','<=', $to)->count();
     $doctor->interview_count = $interviews_count;
    }

   }
   return response()->json($doctors);

                   }
}