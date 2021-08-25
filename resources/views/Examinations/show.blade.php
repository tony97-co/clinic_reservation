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
                     
                     
                       
                        <th scope="col" >Date</th>
                        <th scope="col"  >patient</th>
                        <th scope="col" >patient Age</th>
                        <th scope="col"  >Account</th>
                        <th scope="col"  >Account phone</th>
                        <th scope="col"  >pind</th>
                        <th scope="col"  >finash</th>
                    </tr>
                </thead>
                   <tbody>
                    <td>{{$interview->date}}</td>       
                    <td>{{$interview->name}}</td>
                    <td>{{$interview->age}}</td>
                    <td>{{$interview->patient->patient_name}}</td>
                    <td>{{$interview->phone}}</td>
                
                    <td><a href="/interview/{{$interview->id}}/pind" style="background-color: rgb(228, 228, 51)" class="btn  btn-sm">pind</a></td>
                    <td><a href="/interview/{{$interview->id}}/finsh" class="btn btn-success btn-sm text-white">finsh</a></td>

                </tbody>
            </table>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0">Examinations</h5>
                <div style="direction: rtl">
                    <form action="/examinations/add/{{$interview->id}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm text-white" >Add</button>
                        <input type="text" name="name" >
                        <label for="">
                           : Add Examination
                        </label>
                        
                    </form>
                </div>
            
            </div>
            <table class="table">
                <thead>
                    <tr >
                     
                     
                        <th scope="col" >Date</th>
                        <th scope="col" >Name</th>
                        <th scope="col"  >Result</th>
                     
                       
                    </tr>
                </thead>
                   <tbody>
                    
                           
                 
                       <tr>
                    <td>{{$examination->created_at->diffForHumans()}}</td>       
                    <td>{{$examination->examination_name}}</td>
                    <td>
                        <form action="/examinations/{{$interview->id}}/update" method="POST" >
                            @csrf
                      <input type="file" name="result" >

                  
                       </tr>
                       @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection