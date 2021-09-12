
   <!doctype html>
   <html lang="en">
     <head>
         <title>Login 01</title>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
       <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
   
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       
       <link rel="stylesheet" href="{{asset('../../sty/css/style.css')}}">
   
       </head>
       <body>
       <section class="ftco-section">
           <div class="container">
               
               <div class="row justify-content-center">
                   <div class="col-md-7 col-lg-5">
                       <div class="login-wrap p-4 p-md-5">
                     <div class="icon d-flex align-items-center justify-content-center">
                         <span class="fa fa-user-o"></span>
                     </div>
                     <h3 class="text-center mb-4">Sign In</h3>
                           <form  class="login-form" method="POST" action="{{ route('login') }}">
                            @csrf
                         <div class="form-group">
                             <input type="email"  class="form-control rounded-left @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                             @error('email')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                         </div>
                   <div class="form-group d-flex">
                     <input type="password" class="form-control rounded-left  @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                     @error('password')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
                   </div>
                   <div class="form-group">
                       <button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
                   </div>
                   <div class="form-group d-md-flex">
                       <div class="w-50">
                           <label class="checkbox-wrap checkbox-primary">Remember Me
                                         <input type="checkbox"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                         <span class="checkmark"></span>
                                       </label>
                                   </div>
                                   @if (Route::has('password.request'))
                                   <div class="w-50 text-md-right">
                                       <a href="{{ route('password.request') }}">Forgot Password</a>
                                   </div>
                                   @endif
                   </div>
                 </form>
               </div>
                   </div>
               </div>
           </div>
       </section>
   
       <script src="{{asset('../../sty/js/jquery.min.js')}}"></script>
     <script src="{{asset('../../sty/js/popper.js')}}"></script>
     <script src="{{asset('../../sty/js/bootstrap.min.js')}}"></script>




     <script src="{{asset('../../sty/js/main.js')}}"></script>
   
       </body>
   </html>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   