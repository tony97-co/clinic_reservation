@extends('doctorDashbord.index')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> the Result</h5>
            <img  height="500px" width="800px" src="{{asset('storage/results/'.$examination->result)}}" >




        </div>
        </div>  
        </div>


@endsection