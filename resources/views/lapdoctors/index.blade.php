@extends('clinicAdmin.index')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0">Lap Doctors</h5>
            </div>
            <table class="table">
                <thead>
                    <tr style="background-color: rgb(26, 2, 4); color:#ffff">
                     
                        <th scope="col"  style=" color:#ffff">Name</th>
                         <th scope="col"  style=" color:#ffff">Address</th>
                         <th scope="col"  style=" color:#ffff">phone</th>
                         <th scope="col"  style=" color:#ffff">image</th>
                         <th scope="col"  style=" color:#ffff">qualifications</th>
                        <th scope="col"  style=" color:#ffff">Action</th> 
                    </tr>
                </thead>
                <tbody>



                    @foreach ($clinic->users as $lapdoctor)

                    @if ($lapdoctor->role == "lapDoctor")
                    <tr>
                        <th scope="row" >{{$lapdoctor->user_name}}</th>
                  
                        <td>{{$lapdoctor->address}}</td>
                        <td>{{$lapdoctor->phone}}</td>
                       
                        <td><img src="{{asset('storage/image/'.$lapdoctor->image)}}" height="50px" width="100px"></td>
                        <td>{{$lapdoctor->qualifications}}</td>
                      
                        <td><a class="pr-2" href=""><i class="fas fa-trash " style="color: #eb0f3f" > </i></a><a href="" style="margin-left:10px"><i class="fas fa-edit" style="color: #1e0feb"></i></a></td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection