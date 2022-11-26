<!DOCTYPE html>
<html lang="vi">
   <!-- Mirrored from preschool.dreamguystech.com/html-template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:39 GMT -->
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <!-- <title>Preskool - Login</title> -->
      <!-- get name page from .env -->
      <title>{{ config('app.name') }} - đăng nhập</title>
      <link rel="shortcut icon" href="{{asset('/assets/img/favicon.png')}}">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
      <link rel="stylesheet" href="{{asset('/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
      <link rel="stylesheet" href="{{asset('/assets/plugins/fontawesome/css/all.min.css')}}">
      <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
   </head>
   <body>
      <div class="main-wrapper login-body">
         <div class="login-wrapper">
            <div class="container">
               <div class="loginbox">
                  <div class="login-left" style="background-color: white;" >
                  </div>
                  <div class="login-right">
                     <div class="login-right-wrap">
                        <h1>Đăng nhập</h1>
                        <p class="account-subtitle">Quản lý đào tạo Dream School</p>
                        @if (count($errors) >0)
                              <ul>
                                 @foreach($errors->all() as $error)
                                    <li class="text-danger"> {{ $error }}</li>
                                    @break
                                 @endforeach
                              </ul>
                        @endif

                        @if (session('error'))
                              <ul>
                                 <li class="text-danger"> {{ session('error') }}</li>
                              </ul>
                        @endif
                        <form action="{{ route("$role.loginProcess") }}" method="POST">
                           @csrf
                           
                           <div class="form-group">
                              @if ($role == 'admin')
                                 <input class="form-control" value="{{ session('email') }}" name="email" type="email" placeholder="Email" required>
                              @else
                                 <input class="form-control" type="text" name="username" placeholder="Nhập MSSV hoặc Email">
                              @endif
                           </div>
                           <div class="form-group">
                              <input class="form-control" name="password" type="password" placeholder="Password" required>
                           </div>
                           <div class="form-group">
                              <button class="btn btn-primary btn-block" type="submit">Đăng nhập</button>
                           </div>
                        </form>
                        <div class="text-center forgotpass"><a href="{{ route("$role.forgotPassword") }}">Quên mật khẩu?</a></div>
                        <div class="login-or">
                           <span class="or-line"></span>
                           <span class="span-or">or</span>
                        </div>
                        <div class="social-login">
                           <span>Đăng nhập với</span>
                           <a href="{{ route('google.redirect','google') }}" class="google"><i class="fab fa-google"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="{{asset('/assets/js/jquery-3.6.0.min.js')}} "></script>
      <script src="{{asset('/assets/js/popper.min.js')}} "></script>
      <script src="{{asset('/assets/plugins/bootstrap/js/bootstrap.min.js')}} "></script>
      <script src="{{asset('/assets/js/script.js')}} "></script>
   </body>
   <!-- Mirrored from preschool.dreamguystech.com/html-template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:40 GMT -->
</html>