@extends('doctorDashbord.index')
@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Interviews</h5>
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
                                @foreach ($interviews as $interviews)
                                    
                                
                                <tr>
                                    <td>{{$interviews->date}}</td>
                                  
                                    <td>{{$interviews->name}}</td>
                                    <td>{{$interviews->age}}</td>
                                 
                                    <td>{{$interviews->patient->patient_name}}</td>
                                    <td>{{$interviews->phone}}</td>
                                  
                                   

                                   
                                    <td><a href="/interviews/{{$interviews->id}}" class="btn btn-primary btn-sm">start</a></td>
                                
                                    
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