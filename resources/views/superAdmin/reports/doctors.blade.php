@extends('superAdmin.index')
@section('content')
<div class="col-12">
  <div class="card">
      <div class="card-body">
          <h5 class="card-title">Doctors</h5>
          <div class="table-responsive">
              <table id="zero_config" class="table table-striped table-bordered">
                  <thead>
                      <tr>
                          <th>Name</th>
                          <th>image</th>
                          <th>address</th>
                          <th>Specialty</th>
                          <th>Clinic Name</th>
                          <th>Start date</th>
                          <th>Diagnosis prise</th>
                          <th>Work time Count</th>
                          <th>reservaations Count</th>
                    
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($doctors as $doctor)
                          
                      
                      <tr>
                          <td>{{$doctor->user->user_name}} </td>
                          <td><img src="{{asset('storage/doctors/'.$doctor->image)}}" height="50px" width="100px"></td>
                          <td>{{$doctor->address}}</td>
                          <td>{{$doctor->specialist->specalty_name}}</td>
                          <td>{{$doctor->clinic->clinic_name}}</td>
                          <td>{{$doctor->created_at->diffForHumans()}}</td>
                          <td>{{$doctor->price}}</td>
                          <td>{{$doctor->work_time->count()}}</td>
                          <td>{{$doctor->interview->count()}}</td>
                          
                      </tr>
                      
                      @endforeach
                    
                   
                  
                     
                  </tbody>
                  <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>image</th>
                        <th>address</th>
                        <th>Specialty</th>
                        <th>Start date</th>
                      
                        <th>Diagnosis prise</th>
                        <th>Work time Count</th>
                        <th>reservaations Count</th>
                     
                      </tr>
                  </tfoot>
              </table>
          </div>

      </div>
  </div>
  </div>
</div>

@endsection