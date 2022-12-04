{{-- change password --}}
@extends('layouts.student')

@section('style')
    {{-- css --}}
@endsection

@section('script')
    {{-- js --}}

@endsection

@section('content')
    <div class="page-wrapper" style="min-height: 387px;">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{ $page }}</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            @if (count($errors) > 0)
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-danger"> {{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <form action="{{ route('student.info.changePasswordProcess') }}" method="POST" id="change-pass-word-form" >
                                @csrf
                                <div class="col-12">
                                    <h5 class="form-title"><span>Nhập thông tin mật khẩu để đổi mới</span></h5>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Mật khẩu mới</label>
                                    <div class="col-md-10">
                                        <input type="password" class="form-control" placeholder="Mật khẩu mới" name="newPassword" id="new-password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Nhập lại mật khẩu mới</label>
                                    <div class="col-md-10">
                                        <input type="password" class="form-control" placeholder="Nhập lại mật khẩu mới" name="confirmPassword" id="comfirm-password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Mật khẩu cũ</label>
                                    <div class="col-md-10">
                                        <input type="password" class="form-control" placeholder="Mật khẩu cũ" name="oldPassword">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="text-left">
                                        <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                                        <a href="{{ route('student.info.index') }}">
                                            <button type="button" class="btn btn-light btn-sm">Trở lại</button>
                                        </a>
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
