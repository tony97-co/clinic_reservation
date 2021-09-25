@extends('superAdmin.index')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"> Specialties</h5>
            </div>
            <table class="table">
                <thead>
                    <tr style="background-color: rgb(0, 0, 0); color:#ffff">
                        <th scope="col" style=" color:#ffff">id</th>
                        <th scope="col"  style=" color:#ffff">Name</th>
                        <th scope="col"  style=" color:#ffff">Description</th>
                        <th scope="col"  style=" color:#ffff">Doctors Count</th>
                       <th scope="col"  style=" color:#ffff">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Specialists as $Specialty)
                        
                    
                    <tr>
                        <th scope="row" >{{$Specialty->id}}</th>
                        <td>{{$Specialty->specalty_name}}</td>
                        <td>{{$Specialty->des}}</td>
                        <td>{{$Specialty->doctor->count()}}</td>
                       <td><a class="pr-2" href="/Specialty/{{$Specialty->id}}/delete"><i class="fas fa-trash " style="color: #eb0f3f" > </i></a><a href="" style="margin-left:10px"><i class="fas fa-edit" style="color: #1e0feb"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


@endsection