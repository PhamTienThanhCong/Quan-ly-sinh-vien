<!DOCTYPE html>
<html lang="vi">

<!-- Mirrored from preschool.dreamguystech.com/html-template/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:58 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{ config('app.name') }} - Quên mật khẩu</title>

    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">

    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
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
                            <h1>Lại quên mật khẩu?</h1>
                            <p class="account-subtitle">Nhập Email vào đây để hệ thống gửi link nhập lại mật khẩu</p>

                            <form action="{{ route("$role.forgotPasswordProcess") }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" name="email" type="email" placeholder="Email" required>
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit">Đặt lại mật khẩu</button>
                                </div>
                            </form>

                            <div class="text-center dont-have">Bạn vẫn nhớ mật khẩu? <a href="{{ route("$role.login") }}">Đăng nhập</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}" ></script>

    <script src="{{ asset('assets/js/popper.min.js') }}" ></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" ></script>

    <script src="{{ asset('assets/js/script.js') }}" ></script>
</body>

<!-- Mirrored from preschool.dreamguystech.com/html-template/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:58 GMT -->

</html>