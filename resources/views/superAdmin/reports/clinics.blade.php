@extends('superAdmin.index')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Clinic Reports</h5>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>

                                    <th >Name</th>
                                    <th >location </th>
                                    <th >Address</th>
                                    <th >phone</th>
                                    <th >Interviews count </th>
                                    <th>Examinations Count</th>
                                    <th>Doctors Count </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clinics as $clinic)
                                    
                                
                                <tr>
                                    <td>{{$clinic->clinic_name}}</th>
                                    <td>{{$clinic->location}}</td>
                                    <td>{{$clinic->Address}}</td>
                                    <td>{{$clinic->phone}}</td>

                                    <td>{{$clinic->interviewsCount}}</td>
                                    <td>{{$clinic->examination->count()}}</td>
                                    <td>{{$clinic->doctors->count()}}</td>
                                </tr>
                                @endforeach
                              
                              
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th >Name</th>
                                    <th >location </th>
                                    <th >Address</th>
                                    <th >phone</th>
                                    <th >Interviews count </th>
                                    <th>Examinations Count</th>
                                    <th>Doctors Count </th>

                                </tr>
                            </tfoot>
                        </table>
                    </div>
          
                </div>
            </div>
            </div>
          </div>
           

@endsection