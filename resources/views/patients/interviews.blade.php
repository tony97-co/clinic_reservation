@extends('superAdmin.index')
@section('content')
<div class="col-12">
  <div class="card">
      <div class="card-body">
          <h5 class="card-title">Pinnded Interviews</h5>
          <div class="table-responsive">
              <table id="zero_config" class="table table-striped table-bordered">
                  <thead>
                      <tr>
                        <th>Date</th>
                        <th>Doctor</th>
                        <th>Doctor Spishalty</th>
                        <th>Patient</th>
                        <th>Account</th>
                  
                        <th>Examinations</th>
                   
                      </tr>
                  </thead>
                  <tbody>
                     
                        @foreach ($patient->interveiw as $interviews)
                                    
                                
                        <tr>
                            <td>{{$interviews->date}}</td>
                            <td>{{$interviews->doctor->user->user_name}}</td>
                            <td>{{$interviews->doctor->specialist->specalty_name}}</td>
                            <td>{{$interviews->name}}</td>
                         
                            <td>{{$interviews->patient->patient_name}}</td>
                          
                          
                           

                            <td><button class="btn btn-primary btn-sm" onclick="test({{$interviews->examinations}})">sohw</button></td>
                          
                      </tr>
                      
                      @endforeach
                    
                  
                     
                  </tbody>
                  <tfoot>
                      <tr>
                        <th>Date</th>
                        <th>Doctor</th>
                        <th>Doctor Spishalty</th>
                        <th>Patient</th>
                        <th>Account</th>
                        <th>Examinations</th>
                      </tr>
                  </tfoot>
              </table>
          </div>

      </div>
  </div>
  </div>
</div>
<script>
     var test = function(examinations){
                    
                    var myhtml=document.createElement('div')
                    var y=`<table class='table'> <thead><th> name </th> <th> result </th> <th> price </th> <th> statuis </th></thead><tbody><tr>`;
                   var x='';
                   examinations.forEach(function(p){
                    x+=`<td> ${p.examination_name} </td>
                        <td><a  class="btn btn-primary btn-sm" href="/result/${p.id}/show">show</a></td>
                        <td>  ${p.examination_price} </td>
                        <td>  ${p.state} </td>
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
                      title:'Examinations',
                      content: myhtml
                    })
                    console.log(y);
                }
               
   
</script>
@endsection