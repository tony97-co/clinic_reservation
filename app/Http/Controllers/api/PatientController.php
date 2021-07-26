<?php

namespace App\Http\Controllers\api;
use Illuminate\Http\Response;
use App\Models\Patient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


 /*****************************************************************************************************
     * 
     *                                   Begin Regester Function 
     * 
     *****************************************************************************************************/
    public function Register(Request $request)
    {
        $Patient = Patient::where('phone', '=', $request->input('phone'))->first();
        if($Patient == null){
                $new_user = Patient::create([ //انشاء مستخدم جديد
                                'patient_name' => $request['name'],
                                'phone' => $request['phone'],
                                'email' => $request['email'],
                             
                                'password' =>$request['password'],
                                'remember_token' => Str::random(60),
                            ]);
                            return response()->json(
                              ['error'=>false,
                              'message'=>'',
                              'data'=>$new_user],201);
            
            
        }else
            return response()->json(
              ['error'=>true,
              'message'=> 'The Phone Is Duplicated...',
              'code'=> 4  ]
              ,400); //يوجد مستخدم بهذا الرقم
    }
     /*****************************************************************************************************
     * 
     *                                   End  Regester Function 
     * 
     *****************************************************************************************************/
    /*****************************************************************************************************
     * 
     *                                   Begin Login Function 
     * 
     *****************************************************************************************************/
    public function login(Request $request){
        $Patient = Patient::where('phone', '=', $request->input('phone'))->first();
        if($Patient != null){// for test user not empty
         
          if($request->input('password') == $Patient->password){
            $token = Str::random(60);// token generation لتوليد توكن لتمييز المستخدمين
            $Patient->forceFill([
                'remember_token' => $token,
            ])->save(); // حفظ التوكن في قاعدة البيانات 
            return response()->json(
              ['error'=>false,
              'message'=>'',
              'data'=>$Patient]
              ,200); // رقم الهاتف وكلمة المرور صحيحة وارجاع رسالة 200 
          }else{
                return response()->json(
                  ['error'=> true,
                  'message'=>'The Password Is Wrong',
                  'code'=> 0 ]
                  ,401); // خطأ في كلمة المرور
               }
        } else{
                return response()->json(
                  ['error'=> true,
                  'message'=>'Phone Number Is Incorrect' ,
                  'code'=> 1 ]
                  ,401); // خطأ في رقم الهاتف 
              }
    } 
     /*****************************************************************************************************
     * 
     *                                   End  Login Function 
     * 
     *****************************************************************************************************/
     /*****************************************************************************************************
     * 
     *                                   Begin  Profile Function 
     * 
     *****************************************************************************************************/
    public function profile(Request $request , $id){
        
        $Patient = Patient::find($id);
        if($Patient == null)
          return response()->json([
            'error'=> true,
            'message'=>'Phone Number Is Incorrect' ,  //الهاتف غير صحيح
            'code'=> 1  ],
              404);
        else{
           
          $Patient->fill($request->all())->save();
          return response()->json([
          'error'=>false,
          'message'=>'',
          'data'=>$Patient],200);
        }
    }
     /*****************************************************************************************************
     * 
     *                                   End  Profile Function 
     * 
     *****************************************************************************************************/
     
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
    public function store(Request $request)
    {
        //
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
