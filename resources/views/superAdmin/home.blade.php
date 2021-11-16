@extends('superAdmin.index')
@section('content')


<div class="row">
   <!-- Column -->
   <div class="col-md-6 col-lg-3">
    <div class="card card-hover">
        <div class="box bg-cyan text-center">
            <h1 class="font-light text-white"><i class="far fa-calendar-plus"></i></h1>
            <span class="text-white" style="font-size: medium " >{{$SnewCount}}</span>
            
            <h6 class="text-white">New Reservations</h6>
     
        </div>
    </div>
</div>
<!-- Column -->
<div class="col-md-6 col-lg-3">
    <div class="card card-hover">
        <div class="box bg-success text-center">
            <h1 class="font-light text-white"><i class="far fa-calendar-check"></i></h1>
            
            <span class="text-white" style="font-size: medium " >{{$finshedCount}}</span>
            
            <h6 class="text-white">Fineshed Reservations</h6>
        </div>
    </div>
</div>
<!-- Column -->
<div class="col-md-6 col-lg-3">
    <div class="card card-hover">
        <div class="box bg-warning text-center">
            <h1 class="font-light text-white"><i class="fad fa-calendar-minus"></i></h1>
            <span class="text-white" style="font-size: medium " >{{$pindedCount}}</span>
            
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
            <h1 class="font-light text-white"><i class="mdi mdi-domain"></i></h1>
            <span class="text-white" style="font-size: medium " >{{$clinics}}</span>
            
            <h6 class="text-white">Total Clinics</h6>
     
        </div>
    </div>
</div>
<!-- Column -->
<div class="col-md-6 col-lg-3">
    <div class="card card-hover">
        <div style="background-color: rgb(34, 5, 61)" class="box  text-center">
            <h1 class="font-light text-white"><i class="fas fa-procedures"></i></h1>
            
            <span class="text-white" style="font-size: medium " >{{  $Patients}}</span>
            
            <h6 class="text-white">Total Patients</h6>
        </div>
    </div>
</div>

 <!-- Column -->
 <div class="col-md-6 col-lg-3">
    <div class="card card-hover">
        <div style="background-color: rgb(34, 5, 61)" class="box  text-center">
            <h1 class="font-light text-white"><i class="mdi mdi-chart-scatterplot-hexbin"></i></h1>
            <span class="text-white" style="font-size: medium " >{{$Specialist}}</span>
            
            <h6 class="text-white">Total Specialties</h6>
     
        </div>
    </div>
</div>
<!-- Column -->
<div class="col-md-6 col-lg-3">
    <div class="card card-hover">
        <div style="background-color: rgb(34, 5, 61)" class="box  text-center">
            <h1 class="font-light text-white"><i class="fas fa-users"></i></h1>
            <span class="text-white" style="font-size: medium " >{{$users}}</span>
            
            <h6 class="text-white">Total System Users</h6>
          
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
            <span class="text-white" style="font-size: medium " >{{$DoctorsCount}}</span>
            
            <h6 class="text-white">Total Doctors</h6>
     
        </div>
    </div>
</div>
<!-- Column -->
<div class="col-md-6 col-lg-3">
    <div class="card card-hover">
        <div style="background-color: rgb(34, 5, 61)" class="box  text-center">
            <h1 class="font-light text-white"><i class="fas fa-user-md"></i></h1>
            
            <span class="text-white" style="font-size: medium " >{{$lapdoctors}}</span>
            
            <h6 class="text-white">Total Lapdoctors</h6>
        </div>
    </div>
</div>

 <!-- Column -->
 <div class="col-md-6 col-lg-3">
    <div class="card card-hover">
        <div style="background-color: rgb(34, 5, 61)" class="box  text-center">
            <h1 class="font-light text-white"><i class="far fa-calendar"></i></h1>
            <span class="text-white" style="font-size: medium " >{{$interviewsCount}}</span>
            
            <h6 class="text-white">Total Reservations</h6>
     
        </div>
    </div>
</div>
<!-- Column -->
<div class="col-md-6 col-lg-3">
    <div class="card card-hover">
        <div style="background-color: rgb(34, 5, 61)" class="box  text-center">
            <h1 class="font-light text-white"><i class="fas fa-prescription-bottle"></i></h1>
            <span class="text-white" style="font-size: medium " >{{$examinationcount}}</span>
            
            <h6 class="text-white">Total Examinations</h6>
          
        </div>
    </div>
</div>

   
</div>
<div class="row" style="background-color: coral;background-image:url({{asset('../../images/background/img4.jpg')}})">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title">Site Analysis</h4>
                        <h5 class="card-subtitle">Overview of Latest Month</h5>
                    </div>
                </div>
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
                        <canvas id="myChart" style="height: 90px ,width:40px"></canvas>
                    </div>
                    
                    </div>
                    <!-- column -->
                </div>
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
                                <th>Doctor </th>
                                <th>Doctor Specialty</th>
                                <th>The Clinic</th>
                                <th>patient Name</th>
                                <th>patient Age</th>
                                <th>Account</th>
                           
                                <th>Interview Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($todayInterviews as $interviews)
                                    
                                
                            <tr>
                                <td>{{$interviews->date}}</td>
                                <td>{{$interviews->doctor->user->user_name}}</td>
                                <td>{{$interviews->doctor->specialist->specalty_name}}</td>
                                <td>{{$interviews->doctor->clinic->clinic_name}}</td>
                                <td>{{$interviews->name}}</td>
                                <td>{{$interviews->age}}</td>
                                <td>{{$interviews->patient->patient_name}}</td>
                               
                                <td>{{$interviews->state}}</td>

                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>Doctor </th>
                                <th>Doctor Specialty</th>
                                <th>The Clinic</th>
                                <th>patient Name</th>
                                <th>patient Age</th>
                                <th>Account</th>
                           
                                <th>Interview Status</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
        </div>
</div>
@endsection