@extends('superAdmin.index')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0">Static Table</h5>
            </div>
            <table class="table">
                <thead>
                    <tr style="background-color: rgb(26, 2, 4); color:#ffff">
                        <th scope="col" style=" color:#ffff">id</th>
                        <th scope="col"  style=" color:#ffff">Name</th>
                        <th scope="col"  style=" color:#ffff">Description</th>
                        <th scope="col"  style=" color:#ffff">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Specialists as $Specialty)
                        
                    @endforeach
                    <tr>
                        <th scope="row" >{{$Specialty->id}}</th>
                        <td>{{$Specialty->name}}</td>
                        <td>{{$Specialty->des}}</td>
                        <td><a class="pr-2" href=""><i class="fas fa-trash " style="color: #eb0f3f" > </i></a><a href="" style="margin-left:10px"><i class="fas fa-edit" style="color: #1e0feb"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>


@endsection