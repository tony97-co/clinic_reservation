@extends('clinicAdmin.index')
@section('content')
<div class="row">
    <!-- Column -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="box bg-cyan text-center">
                <h1 class="font-light text-white"><i class="far fa-calendar-plus"></i></h1>
                <span class="text-white" style="font-size: medium " >{{$newInterviewsClinicCount}}</span>
                
                <h6 class="text-white">New Reservations</h6>
         
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="box bg-success text-center">
                <h1 class="font-light text-white"><i class="far fa-calendar-check"></i></h1>
                
                <span class="text-white" style="font-size: medium " >{{$fineshedInterviewsClinicCount}}</span>
                
                <h6 class="text-white">Fineshed Reservations</h6>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="box bg-warning text-center">
                <h1 class="font-light text-white"><i class="fad fa-calendar-minus"></i></h1>
                <span class="text-white" style="font-size: medium " >{{$pindeingInterviewsClinicCount}}</span>
                
                <h6 class="text-white">pinding Interviews</h6>
                
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="box bg-danger text-center">
                <h1 class="font-light text-white"><i class="far fa-calendar-times"></i></h1>
                <span class="text-white" style="font-size: medium " >0</span>
                
                <h6 class="text-white">Canceled Reservations</h6>
              
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!-- Column -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div style="background-color: rgb(34, 5, 61)" class="box  text-center">
                <h1 class="font-light text-white"><i class="fas fa-user-md"></i></h1>
                <span class="text-white" style="font-size: medium " >{{$clinicDoctorsCount}}</span>
                
                <h6 class="text-white">Total Doctors</h6>
         
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div style="background-color: rgb(34, 5, 61)" class="box  text-center">
                <h1 class="font-light text-white"><i class="fas fa-user-md"></i></h1>
                
                <span class="text-white" style="font-size: medium " >{{$clinicLapCount}}</span>
                
                <h6 class="text-white">Total Lapdoctors</h6>
            </div>
        </div>
    </div>
    
     <!-- Column -->
     <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div style="background-color: rgb(34, 5, 61)" class="box  text-center">
                <h1 class="font-light text-white"><i class="far fa-calendar"></i></h1>
                <span class="text-white" style="font-size: medium " >{{$interviewsClinicCount}}</span>
                
                <h6 class="text-white">Total Reservations</h6>
         
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div style="background-color: rgb(34, 5, 61)" class="box  text-center">
                <h1 class="font-light text-white"><i class="fas fa-prescription-bottle"></i></h1>
                <span class="text-white" style="font-size: medium " >{{$clinicExams}}</span>
                
                <h6 class="text-white">Total Examinations</h6>
              
            </div>
        </div>
    </div>
</div>


 <div class="row">
<div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Today Reservations</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Doctor</th>
                                <th>Doctor Specialty</th>
                                <th>patient</th>
                                <th>patient Age</th>
                                <th>Account</th>
                           
                                <th>Status</th>
                        
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($interviews as $interviews)
                                    
                                
                                <tr>
                                    <td>{{$interviews->date}}</td>
                                    <td>{{$interviews->user_name}}</td>
                                    <td>{{$interviews->specalty_name}}</td>
                                    <td>{{$interviews->name}}</td>
                                    <td>{{$interviews->age}}</td>
                                    <td>{{$interviews->patient_name}}</td>
                                    <td>{{$interviews->state}}</td>
                                </tr>
                                @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>Doctor</th>
                                <th>Doctor Specialty</th>
                                <th>patient</th>
                                <th>patient Age</th>
                                <th>Account</th>
                           
                                <th>Status</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
        </div>
</div>
@endsection