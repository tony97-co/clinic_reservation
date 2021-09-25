@extends('superAdmin.index')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0">All Clinics</h5>
            </div>
            <table class="table">
                <thead>
                    <tr style="background-color: rgb(0, 0, 0); color:#ffff">
                     
                        <th scope="col"  style=" color:#ffff">Name</th>
                        <th scope="col"  style=" color:#ffff">location </th>
                        <th scope="col"  style=" color:#ffff">Address</th>
                        <th scope="col"  style=" color:#ffff">phone</th>
                        <th scope="col"  style=" color:#ffff">Avatar</th>
                      
                        <th scope="col"  style=" color:#ffff">Doctors</th>
                        <th scope="col"  style=" color:#ffff">Action</th> 
                    </tr>
                </thead>
                <tbody>



                    @foreach ($clinics as $clinic)
                    <tr>
                        <th scope="row" >{{$clinic->clinic_name}}</th>
                        <td>{{$clinic->location}}</td>
                        <td>{{$clinic->Address}}</td>
                        <td>{{$clinic->phone}}</td>
                       
                        <td>no image</td>
                        <td><a href=""><button style="background-color: #27a9e3" type="button" class="btn  btn-sm">{{$clinic->doctors->count()}}</button></a></td>
                        <td><a class="pr-2" href="/clinic/{{$clinic->id}}/delete"><i class="fas fa-trash " style="color: #eb0f3f" > </i></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
