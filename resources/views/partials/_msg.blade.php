@if(Session::has('SUCCESS'))

<div class="alert alert-success" role="alert" >
    <strong>Success: </strong>   {{Session::get('SUCCESS')}}
  </div>
@endif
@if(Session::has('success'))

<div class="alert alert-success" role="alert" >
    <strong>Success: </strong>   {{Session::get('success')}}
  </div>
@endif

@if(Session::has('error'))

<div class="alert alert-danger" role="alert" >
    <strong>Error : </strong>   {{Session::get('error')}}
  </div>
@endif


@if (count($errors) > 0)

<div class="alert alert-danger" role="alert" >
    
    <ul>
      
        @foreach($errors->all() as $error)
        <li>
          <strong>ERRORS :   </strong> 
            {{$error}}
        </li>
        @endforeach
    </ul>
</div>
@endif