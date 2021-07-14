@extends('clinicAdmin.index')
@section('content')
<div class="row" style="margin: 30px 10px 30px 100px">
    <div class="col-md-9">
        <div class="card">
            <form class="form-horizontal" action="/specialties" method="POST"> 
                @csrf
                <div class="card-body">
                    <h4 class="card-title">Personal Info</h4>
                    <div class="form-group row">
                        <label for="fname"
                            class="col-sm-3 text-end control-label col-form-label"> Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" id="fname"
                                placeholder=" Name Here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname"
                            class="col-sm-3 text-end control-label col-form-label"> Address</label>
                        <div class="col-sm-9">
                            <input type="text" name="Address" class="form-control" id="fname"
                                placeholder="Address Here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-end control-label col-form-label">
                                Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" id="lname"
                                placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                      
                        <div class="col-sm-9">
                            <input type="hidden" value="12345678" name="Password" class="form-control" id="lname"
                                placeholder="Password Here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email1"
                            class="col-sm-3 text-end control-label col-form-label">image</label>
                        <div class="col-sm-9">
                            <input type="file" name="image" class="form-control" id="email1"
                              >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cono1"
                            class="col-sm-3 text-end control-label col-form-label">Contact No</label>
                        <div class="col-sm-9">
                            <input type="text" name="phone" class="form-control" id="cono1"
                                placeholder="Contact No Here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cono1"
                            class="col-sm-3 text-end control-label col-form-label">qualifications</label>
                        <div class="col-sm-9">
                            <textarea name="qualifications" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Submit</button> 
                        <button type="reset" style="border-block-color: blue" class="btn ">cancel</button> 
                    </div>
                </div>
            </form>
        </div>
@endsection