@extends('superAdmin.index')
@section('content')
<div class="row" style="margin: 60px 20px 50px 100px">
    <div class="col-md-8">
        <div class="card">
            <form class="form-horizontal" action="/specialties" method="POST"> 
                @csrf
                <div class="card-body">
                    <h4 class="card-title" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Specialty Add</h4>
                    <div class="form-group row">
                        <label for="fname"
                            class="col-sm-3 text-end control-label col-form-label"> Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname"
                              name="name"  placeholder="Specialty Name Here">
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label for="cono1"
                            class="col-sm-3 text-end control-label col-form-label">Description</label>
                        <div class="col-sm-9">
                            <textarea name="Description" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection