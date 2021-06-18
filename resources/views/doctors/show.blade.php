@extends('layouts.master')
@section('content')
<div class="container-fluid img">
  <div class="panel panel-default">
        <div class="panel-body">
          <div class="row " id="margin-form">
            <div class="col-md-10 col-sm-12 ">
            <div class="row">
          <form  action="/doctors" method="post" role="form" enctype="multipart/form-data" class="form-container">
             @csrf

             <div class="col-md-12">
                <div class="card">
                    <form class="form-horizontal">
                        <div class="card-body">
                            <h4 class="card-title">Create New Doctor</h4>


                            <div class="row ">
                                <div class="col-md-12 col-sm-12 ">
                                  <table class="table table-bordered tabledesign" dir="rtl" >
                                   <thead >
                                    <tr>
                                     <th class="text-center"  width="2%">رقم المشرف</th>
                                     <th class="text-center"  width="15%">الاسم</th>
                                     <th class="text-center">العنوان</th>
                                     <th class="text-center"  width="8%">رقم التلفون</th>
                                     <th class="text-center"  width="10%">الايميل</th>
                                     <th class="text-center">كلمة السر</th>
                                     <th class="text-center"  width="10%">دولة المشرف</th>
                                     <th class="text-center"  >
                                 العمليات<i class="fa fa-gear fa-lg mr"></i>
                                      </label></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($doctor as $Doctor): ?>
                                 <tr>
                                  <td>{{$Doctor->name}}</td>
                                  <td>{{$Doctor->carrier}}</td>
                                  <td>{{$Doctor->price}}</td>
                                  <td>{{$Doctor->birth}}</td>
                                  <td>{{$Doctor->degree}}</td>
                                  <td>{{$Doctor->about}}</td>


                                   </tr>
                                 <?php endforeach; ?>
                                </tbody>

                             </table>

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



{{-- @extends('layouts.master')
@section('content')
<div class="panel panel-default">
   <div class="panel-heading text-center">بيانات  المشرفين</div>
     <div class="panel-body ">
      <div class="row ">
       <div class="col-md-12 col-sm-12 ">
         <table class="table table-bordered tabledesign" dir="rtl" >
          <thead >
           <tr>
            <th class="text-center"  width="2%">رقم المشرف</th>
            <th class="text-center"  width="15%">الاسم</th>
            <th class="text-center">العنوان</th>
            <th class="text-center"  width="8%">رقم التلفون</th>
            <th class="text-center"  width="10%">الايميل</th>
            <th class="text-center">كلمة السر</th>
            <th class="text-center"  width="10%">دولة المشرف</th>
            <th class="text-center"  >
        العمليات<i class="fa fa-gear fa-lg mr"></i>
             </label></th>
         </tr>
       </thead>
       <tbody>
         <?php foreach ($doctor as $Doctor): ?>
        <tr>
         <td>{{$Doctor->name}}</td>
         <td>{{$Doctor->carrier}}</td>
         <td>{{$Doctor->price}}</td>
         <td>{{$Doctor->birth}}</td>
         <td>{{$Doctor->degree}}</td>
         <td>{{$Doctor->about}}</td>


          </tr>
        <?php endforeach; ?>
       </tbody>

    </table>

   </div>
   </div>
  </div>
</div>

@endsection --}}

