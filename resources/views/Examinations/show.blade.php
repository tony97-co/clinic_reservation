@extends('lapdoctors.dashbord.index')
@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0">Interview Information</h5>
            </div>
            <table class="table">
                <thead>
                    <tr >
                     
                     
                       
                        <th scope="col" > Interview Date</th>
                        <th scope="col"  >patient</th>
                        <th scope="col" >patient Age</th>
                        <th scope="col"  >Account</th>
                        <th scope="col"  >Account phone</th>
                        <th scope="col"  >pind</th>
                        <th scope="col"  >Edit</th>
                    </tr>
                </thead>
                   <tbody>
                    <td>{{$examination->interview->date}}</td>       
                    <td>{{$examination->interview->name}}</td>
                    <td>{{$examination->interview->age}}</td>
                    <td>{{$examination->interview->patient->patient_name}}</td>
                    <td>{{$examination->interview->phone}}</td>
                
                    <td><a href="/examination/{{$examination->id}}/pind" style="background-color: rgb(228, 228, 51)" class="btn  btn-sm">pind</a></td>
                    <td><a href="/examination/{{$examination->id}}/edit" class="btn btn-success btn-sm text-white">Edit</a></td>

                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0">Examinations Result</h5>
              
             

                <div class="col-md-8">
                    <div class="card">
                        <form  class="form-horizontal" action="/examination/{{$examination->id}}/update" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                
                                <div class="form-group row">
                                    <label for="fname"
                                        class="col-sm-3 text-end control-label col-form-label">Add  Result </label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" id="fname"
                                          name="result"  >
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




            
    </div>
</div>
    </div>
    </div>

@endsection