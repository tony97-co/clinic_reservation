
@extends('lapdoctors.dashbord.index') 
@section('content') 

<div class="row" style="margin: 30px 10px 30px 100px">
    <div class="col-md-9">
        <div class="card">
            <form class="form-horizontal" action="/lapDoctors" method="POST" enctype="multipart/form-data"> 
                @csrf
                <div class="card-body">
                    <h4 class="card-title">Examination Edit</h4>
                    <div class="form-group row">
                        <label for="fname"
                            class="col-sm-3 text-end control-label col-form-label"> Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" value="{{$examination->examination_name}}" class="form-control" id="fname"
                                placeholder=" Name Here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname"
                            class="col-sm-3 text-end control-label col-form-label"> Address</label>
                        <div class="col-sm-9">
                            <input type="file" name="resualt"  class="form-control" 
                               >
                        </div>
                    </div>
                  
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Submit</button> 
                        <button type="reset" class="btn btn-danger text-white">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
 @endsection