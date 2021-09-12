@extends('clinicAdmin.index')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Examination</h5>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>patient Name</th>
                                    <th>patient Age</th>
                                    <th>Account</th>
                                    <th>Examination Name</th>
                                    <th>Examination Result</th>
                                    <th>Status</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($examinations as $examination)
                                    
                                
                                <tr>
                                    <td>{{$examination->created_at->diffForHumans()}}</td>
                                    <td>{{$examination->interview->name}}</td>
                                    <td>{{$examination->interview->age}}</td>
                                    <td>{{$examination->interview->patient->patient_name}}</td>
                                    <td>{{$examination->examination_name}}</td>
                                    <td>{{$examination->result}}</td>
                                   
                                    <td>{{$examination->state}}</td>
                                  
                                </tr>
                                @endforeach
                              
                              
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Date</th>
                                    <th>patient Name</th>
                                    <th>patient Age</th>
                                    <th>Account</th>
                                    <th>Examination Name</th>
                                    <th>Examination Result</th>
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