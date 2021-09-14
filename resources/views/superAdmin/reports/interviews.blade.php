@extends('superAdmin.index')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Interviews Reports</h5>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Doctor</th>
                                    <th>Doctor Specialty</th>
                                    <th>The Clinic</th>
                                    <th>patient</th>
                                    <th>patient Age</th>
                                    <th>Account</th>
                               
                                    <th>Status</th>
                                    <th>Examination Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($interviews as $interviews)
                                    
                                
                                <tr>
                                    <td>{{$interviews->date}}</td>
                                    <td>{{$interviews->doctor->user->user_name}}</td>
                                    <td>{{$interviews->doctor->specialist->specalty_name}}</td>
                                    <td>{{$interviews->doctor->clinic->clinic_name}}</td>
                                    <td>{{$interviews->name}}</td>
                                    <td>{{$interviews->age}}</td>
                                    <td>{{$interviews->patient->patient_name}}</td>
                                    <td>{{$interviews->state}}</td>
                                    <td>{{$interviews->examinations->count()}}</td>

                                </tr>
                                @endforeach
                              
                              
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Date</th>
                                    <th>Doctor</th>
                                    <th>Doctor Specialty</th>
                                    <th>The Clinic</th>
                                    <th>patient</th>
                                    <th>patient Age</th>
                                    <th>Account</th>
                                    <th>Status</th>
                                    <th>Examination Count</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
          
                </div>
            </div>
            </div>
          </div>


@endsection