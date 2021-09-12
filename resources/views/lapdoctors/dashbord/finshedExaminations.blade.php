@extends('lapdoctors.dashbord.index')
@section('content')

<div class="col-12">
  <div class="card">
      <div class="card-body">
          <h5 class="card-title">Completed Examinations</h5>
          <div class="table-responsive">
              <table id="zero_config" class="table table-striped table-bordered">
                  <thead>
                      <tr>
                        <th>Date</th>

                        <th>Name</th> 

                          <th>Result</th> 

                         <th>Result Date</th> 
                         <th> Doctor</th> 
                        <th>patient</th>
                      
                        <th>open</th>
                        
                      </tr>
                  </thead>
                  <tbody>
                     
                        @foreach ($examinations as $examination)
                                    
                                
                        <tr>
                            <td>{{$examination->created_at }}</td>
                            <td>{{$examination->examination_name }}</td>
                            <td><img class="pic" src="{{asset('storage/results/'.$examination->result)}}" >
                              <img class="picbig" src="{{asset('storage/results/'.$examination->result)}}" ></td>
                            <td>{{$examination->updated_at }}</td>
                            <td>{{$examination->interview->doctor->user->user_name}}</td>
                            <td>{{$examination->interview->patient->patient_name}}</td>
                          
                   
                        
                            <td>
                                
                                <a href="/examination/{{$examination->id}}/edit" class="btn btn-primary btn-sm">Edit</a></td>
                        
                      </tr>
                      
                      @endforeach
                    
                  
                     
                  </tbody>
                  <tfoot>
                      <tr>
                        <th>Date</th>

                        <th>Name</th> 

                          <th>Result</th> 

                         <th>Result Date</th> 
                         <th> Doctor</th> 
                        <th>patient</th>
                      
                        <th>open</th>
                        
                      </tr>
                  </tfoot>
              </table>
          </div>

      </div>
  </div>
  </div>
</div>
<script>
      var test = function(){
   const { value: file } = await Swal.fire({
  title: 'Select image',
  input: 'file',
  inputAttributes: {
    'accept': 'image/*',
    'aria-label': 'Upload your profile picture'
  }
})

if (file) {
  const reader = new FileReader()
  reader.onload = (e) => {
    Swal.fire({
      title: 'Your uploaded picture',
      imageUrl: e.target.result,
      imageAlt: 'The uploaded picture'
    })
  }
  reader.readAsDataURL(file)
}
      }
</script>
@endsection