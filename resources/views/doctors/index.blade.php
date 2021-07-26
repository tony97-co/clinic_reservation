@extends('clinicAdmin.index')
@section('content')
<div class="col-12">
  <div class="card">
      <div class="card-body">
          <h5 class="card-title">Doctors</h5>
          <div class="table-responsive">
              <table id="zero_config" class="table table-striped table-bordered">
                  <thead>
                      <tr>
                          <th>Name</th>
                          <th>image</th>
                          <th>address</th>
                          <th>Specialty</th>
                          <th>Start date</th>
                          <th>Diagnosis prise</th>
                          <th>Work time</th>
                          <th>reservaations</th>
                          <th>action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($doctors as $doctor)
                          
                      
                      <tr>
                          <td>{{$doctor->user->user_name}} </td>
                          <td> no image</td>
                          <td>{{$doctor->address}}</td>
                          <td>{{$doctor->specialist->specalty_name}}</td>
                          <td>{{$doctor->created_at}}</td>
                          <td>{{$doctor->price}}</td>
                          <td><button class="btn btn-primary btn-sm" onclick="test({{$doctor->work_time}})">sohw</button></td>
                          <td><button class="btn btn-primary btn-sm">sohw</button></td>
                          <td><a class="pr-2" href=""><i class="fas fa-trash " style="color: #eb0f3f" > </i></a><a href="" style="margin-left:10px"><i class="fas fa-edit" style="color: #1e0feb"></i></a></td>
                      </tr>
                      
                      @endforeach
                    
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                     
                        <td>$320,800</td>
                        <td>$320,800</td>
                        <td><button class="btn btn-primary btn-sm">sohw</button></td>
                          <td><button class="btn btn-primary btn-sm">sohw</button></td>
                          <td><a class="pr-2" href=""><i class="fas fa-trash " style="color: #eb0f3f" > </i></a><a href="" style="margin-left:10px"><i class="fas fa-edit" style="color: #1e0feb"></i></a></td>
                    </tr>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                
                        <td>$320,800</td>
                        <td>$320,800</td>
                        <td><button class="btn btn-primary btn-sm">sohw</button></td>
                          <td><button class="btn btn-primary btn-sm">sohw</button></td>
                          <td><a class="pr-2" href=""><i class="fas fa-trash " style="color: #eb0f3f" > </i></a><a href="" style="margin-left:10px"><i class="fas fa-edit" style="color: #1e0feb"></i></a></td>
                    </tr>
                     
                  </tbody>
                  <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>image</th>
                        <th>address</th>
                        <th>Specialty</th>
                        <th>Start date</th>
                      
                        <th>Diagnosis prise</th>
                        <th>Work time</th>
                        <th>reservaations</th>
                        <th>action</th>
                      </tr>
                  </tfoot>
              </table>
          </div>

      </div>
  </div>
  </div>
</div>
<script>
    var test = function(doctor){
        
        var myhtml=document.createElement('div')
        var y=`<table class='table'> <thead><th> day </th> <th> frome </th> <th> to </th> </thead><tbody><tr>`;
       var x='';
       doctor.forEach(function(p){
        x+=`<td> ${p.day} </td>
            <td>  ${p.from} </td>
            <td>  ${p.to} </td>
        </tr>
     
`;



       })
       x+='</tbody></table>'
       y+=x
       myhtml.innerHTML+=y
            

            // myhtml.innerHTML += "  <tbody>" ;
                           
            //                 myhtml.innerHTML += "<tr>" ;
            //                  myhtml.innerHTML += "<td> ahmed </td>" ;
            //                  myhtml.innerHTML += "<td> ahmed </td>" ;
            //                  myhtml.innerHTML += "<td> ahmed </td>" ;
            //                  myhtml.innerHTML += "</tr>" ;
            //                  myhtml.innerHTML += "  </tbody>" ;

            //                     myhtml.innerHTML += " </table>" ;       

          /* for(var i = 0;i < doctor.lenght;i++){
            myhtml.innerHTML +="<tr>" ;
                console.log(doctor[i].day);
                    myhtml.innerHTML +="<td>"+doctor[i].day + "</td>";
                    myhtml.innerHTML +="<td>"+doctor[i].from + "</td>";
                    myhtml.innerHTML +="<td>"+doctor[i].to + "</td>";
                        myhtml.innerHTML +=  "</tr>" ;
           }
                  
              myhtml.innerHTML += "  </tbody>" ;

             myhtml.innerHTML += " </body>" ;          
                           
    */
                           
                       
                           
        swal({
          title:'work days',
          content: myhtml
        })
        console.log(y);
    }
   
</script>
@endsection