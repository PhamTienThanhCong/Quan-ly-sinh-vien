<!DOCTYPE html>
<html lang="vi">
   <!-- Mirrored from preschool.dreamguystech.com/html-template/blank-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:58 GMT -->
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>{{ config('app.name') }} - {{ $page }}</title>
      <link rel="shortcut icon" href="{{ asset('/assets/img/favicon.png') }}">
      <link rel="stylesheet" href="{{ asset('/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
      <script src="https://kit.fontawesome.com/c71231073e.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
      <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
      @yield('style')
   </head>
   <body>
      <div class="main-wrapper">
         @include('layouts.elements.student_header')
         @include('layouts.elements.student_navbar')
         @yield('content')
         @include('layouts.elements._footer')
      </div>
      <script src="{{ asset('/assets/js/jquery-3.6.0.min.js') }}"></script>
      <script src="{{ asset('/assets/js/popper.min.js') }}"></script>
      <script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
      <script src="{{ asset('/assets/js/script.js') }}"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      @yield('script')
      @if (\Session::has('message'))
         <script>
            swal("Thông báo", "{{ \Session::get('message') }}", "{{ \Session::get('status') }}");
         </script>
      @endif
   </body>
   <!-- Mirrored from preschool.dreamguystech.com/html-template/blank-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:58 GMT -->
</html>