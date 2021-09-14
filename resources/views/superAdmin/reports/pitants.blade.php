@extends('superAdmin.index')
@section('content')
<div class="col-12">
  <div class="card">
      <div class="card-body">
          <h5 class="card-title"> Patients Reports</h5>
          <div class="table-responsive">
              <table id="zero_config" class="table table-striped table-bordered">
                  <thead>
                      <tr>
                          <th>Name</th>
                          <th>Gender</th>
                          <th>Phone</th>
                          <th>Blode Type</th>
                          <th>Start date</th>
                          <th>Sensitive</th>
                          <th>Gentics Disease</th>
                          <th>Social Status</th> 
                          <th>reservaations Count</th>
                          <th>Examinations Count</th>
                         
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($patients as $patient)
                          
                      
                      <tr>
                          <td>{{$patient->patient_name}} </td>
                          <td>{{$patient->gender}} </td>
                          <td>{{$patient->phone}}</td>
                          <td>{{$patient->blode_type}}</td>
                          <td>{{$patient->created_at->diffForHumans()}}</td>
                          <td>{{$patient->sensitive}}</td>

                          <td>{{$patient->gentics_disease}} </td>
                         <td>{{$patient->social_status}} </td>
                     
                          <td>{{$patient->interveiw->count()}}</td>
                          <td>{{$patient->examinationsCount}} </td>
                      
                      @endforeach
                    
                
                     
                  </tbody>
                  <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Blode Type</th>
                        <th>Start date</th>
                        <th>Sensitive</th>
                        <th>Gentics Disease</th>
                        <th>Social Status</th> 
                        <th>reservaations</th>
                        <th>Examinations Count</th>
                      </tr>
                  </tfoot>
              </table>
          </div>

      </div>
  </div>
  </div>
</div>


@endsection