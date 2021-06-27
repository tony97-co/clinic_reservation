@extends('layouts.master')
@section('content')
<div class="container-fluid img">
  <div class="panel panel-default">
        <div class="panel-body">
          <div class="row " id="margin-form">
            <div class="col-md-10 col-sm-12 ">
            <div class="row">

          <form  action="{{ route('clinics.store') }}" method="post" role="form" enctype="multipart/form-data" class="form-container">
             @csrf

             <div class="col-md-12">
                <div class="card">
                    <form class="form-horizontal">
                        <div class="card-body">
                            <h4 class="card-title">Create New clinic</h4>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 text-end control-label col-form-label">Clinic Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="clinic_name" placeholder="Name here"
                                    name="clinic_name"  required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-3 text-end control-label col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="name" placeholder="EMail here"
                                    name="email"  required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-3 text-end control-label col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password" placeholder="Password here"
                                    name="password"  required >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="carrier" class="col-sm-3 text-end control-label col-form-label">Location</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="location" placeholder="Enter Location"
                                    name="location"  required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-sm-3 text-end control-label col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="phone" placeholder="Enter phone Number"
                                     name="phone" autofocus>
                                </div>
                            </div>
                            <div>
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>

            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
@endsection
