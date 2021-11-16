@extends('lapdoctors.dashbord.index')
@section('content')

<div class="row">
    <!-- Column -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="box bg-cyan text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                <span class="text-white" style="font-size: medium " >{{$newExamination}}</span>
                
                <h6 class="text-white">New Examinations</h6>
         
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="box bg-success text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                
                <span class="text-white" style="font-size: medium " >{{$finshesdExamination}}</span>
                
                <h6 class="text-white">Fineshed Examinations</h6>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="box bg-warning text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                <span class="text-white" style="font-size: medium " >{{$pindingExamination}}</span>
                
                <h6 class="text-white">pinding Examinations</h6>
                
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="box bg-danger text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                <span class="text-white" style="font-size: medium " >{{$examinationcount}}</span>
                
                <h6 class="text-white">All Examinations</h6>
              
            </div>
        </div>
    </div>
</div>

 <div class="row">
<div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">All Examinations</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Date</th>
                                          
                                <th>Patient</th>
                              
                                <th>Status</th>
                            </tr>
                                
                        </thead>
                        <tbody>
                            @foreach ($examinations as $examination)
                                    
                                
                        <tr>
                          <td>{{$examination->examination_name }}</td>
                          
                            <td>{{$examination->created_at }}</td>
                          
                            <td>{{$examination->interview->patient->patient_name}}</td>
    
                   
                        
                            <td>{{$examination->state }} </td>
                        
                      </tr>
                      
                      @endforeach
                        </tbody>
                        <tfoot>

                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                                      
                            <th>Patient</th>
                          
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