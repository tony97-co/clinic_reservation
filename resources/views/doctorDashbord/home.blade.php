@extends('doctorDashbord.index')
@section('content')

<div class="row">
    <!-- Column -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="box bg-cyan text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                <span class="text-white" style="font-size: medium " >{{$newCount}}</span>
                
                <h6 class="text-white">New Reservations</h6>
         
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="box bg-success text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                
                <span class="text-white" style="font-size: medium " >{{$finshedCount}}</span>
                
                <h6 class="text-white">Fineshed Reservations</h6>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="box bg-warning text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                <span class="text-white" style="font-size: medium " >{{$pindedCount}}</span>
                
                <h6 class="text-white">pinding Interviews</h6>
                
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="box  text-center" style="background-color: rgb(41, 7, 71)">
                <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                <span class="text-white" style="font-size: medium " >{{$allCount}}</span>
                
                <h6 class="text-white">All Interviews</h6>
              
            </div>
        </div>
    </div>
</div>

 <div class="row">
<div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Today Interviews</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>patient</th>
                                <th>patient Age</th>
                                <th>Account</th>
                                <th>Account phone</th>
                               
                                <th>start</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($todayInterviews as $interview)
                                
                          
                            <tr>
                                <td>{{$interview->date}}</td>
                                  
                                <td>{{$interview->name}}</td>
                                <td>{{$interview->age}}</td>
                             
                                <td>{{$interview->patient->patient_name}}</td>
                                <td>{{$interview->phone}}</td>
                              
                               

                               
                                <td><a href="/interviews/{{$interview->id}}" class="btn btn-primary btn-sm">start</a></td>
                            
                            </tr>
                            @endforeach
                         
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>patient</th>
                                <th>patient Age</th>
                                <th>Account</th>
                                <th>Account phone</th>
                               
                                <th>start</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
        </div>
</div>
@endsection