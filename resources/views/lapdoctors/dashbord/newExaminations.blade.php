@extends('lapdoctors.dashbord.index')
@section('content')

<div class="col-12">
  <div class="card">
      <div class="card-body">
          <h5 class="card-title">New Examinations</h5>
          <div class="table-responsive">
              <table id="zero_config" class="table table-striped table-bordered">
                  <thead>
                      <tr>
                        <th>Name</th>
                        <th>Date</th>
                                  
                        <th>patient</th>
                      
                        <th>open</th>
                        
                      </tr>
                  </thead>
                  <tbody>
                     
                        @foreach ($examinations as $examination)
                                    
                                
                        <tr>
                          <td>{{$examination->examination_name }}</td>
                          
                            <td>{{$examination->created_at }}</td>
                          
                            <td>{{$examination->interview->patient->patient_name}}</td>
    
                   
                        
                            <td>
                                
                                <a href="/examination/{{$examination->id}}" class="btn btn-primary btn-sm">Open</a></td>
                        
                      </tr>
                      
                      @endforeach
                    
                  
                     
                  </tbody>
                  <tfoot>
                      <tr>
                        <th>Date</th>
                                  
                        <th>patient</th>
                       
                        <th>Open</th>
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