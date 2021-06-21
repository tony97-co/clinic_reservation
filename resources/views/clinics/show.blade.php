@extends('layouts.master')
@section('content')
<div class="container-fluid img">
  <div class="panel panel-default">
        <div class="panel-body">
          <div class="row " id="margin-form">
            <div class="col-md-10 col-sm-12 ">
            <div class="row">

          <form  action="{{ route('doctors.store') }}" method="post" role="form" enctype="multipart/form-data" class="form-container">
             @csrf

             <div class="col-md-12">
                <div class="card">
                    <form class="form-horizontal">
                        <div class="card-body">
                            <h4 class="card-title">Create New Doctor</h4>
                            {{-- <div class="form-group row">
                                <label for="name" class="col-sm-3 text-end control-label col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" placeholder="Name here"
                                    name=""  required autocomplete="name" autofocus>
                                </div>
                            </div> --}}
                            <div class="form-group row">
                                <label for="carrier" class="col-sm-3 text-end control-label col-form-label">Carrier</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="carrier" placeholder="Carrier"
                                    name="carrier"  required autocomplete="carrier" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-sm-3 text-end control-label col-form-label">Price</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="price" placeholder="Enter Price"
                                     name="price"  required autocomplete="price" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="degree" class="col-sm-3 text-end control-label col-form-label">Degree</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="lname" placeholder="Enter Degree"
                                    name="degree"  required autocomplete="degree" autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="birth" class="col-sm-3 text-end control-label col-form-label">Birth</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="birth" placeholder="Enter your Birthday"
                                    name="birth"  required autocomplete="birth" autofocus>
                                </div>
                            </div>
                            </div>
                            <div class="form-group row">
                                <label for="cono1" class="col-sm-3 text-end control-label col-form-label">About Doctor</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control"
                                    name="about"  required autocomplete="about" autofocus>
                                    </textarea>
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
