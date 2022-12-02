@extends('layouts.student')

@section('style')
    {{-- css --}}
@endsection

@section('script')
    <script>
        let ImgStudent = document.getElementById('img-preview');
        let inputImg = document.getElementById('input-img');

        inputImg.addEventListener('change', function () {
            ImgStudent.src = URL.createObjectURL(this.files[0]);
        });
    </script>
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
                            <form action="{{ route("student.info.editProcess") }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Chỉnh sửa thông tin cá nhân</span></h5>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label>Mã số sinh viên</label>
                                        <div class="form-group">
                                            <input type="text" value="{{ Auth::guard('student')->user()->ma_sinh_vien }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label>Địa chỉ email</label>
                                        <div class="form-group">
                                            <input type="text" value="{{ Auth::guard('student')->user()->email }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Họ Tên</label>
                                            <input type="text" value="{{ Auth::guard('student')->user()->ho_ten }}"  name="ho_ten" placeholder="họ và tên" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Giới tính</label>
                                            <select name="gioi_tinh" class="form-control" required>
                                                <option value="1" {{ Auth::guard('student')->user()->gioi_tinh == 1 ? 'selected' : '' }}>Nam</option>
                                                <option value="0" {{ Auth::guard('student')->user()->gioi_tinh == 0 ? 'selected' : '' }}>Nữ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Sinh Ngày</label>
                                            <input name="ngay_sinh" type="date" value="{{ Auth::guard('student')->user()->ngay_sinh }}" class="form-control" required>

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Số điện thoại</label>
                                            <input type="text" name="so_dien_thoai" value="{{ Auth::guard('student')->user()->so_dien_thoai }}" placeholder="số điện thoại" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <input type="text" name="dia_chi" value="{{ Auth::guard('student')->user()->dia_chi }}" placeholder="địa chỉ" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Ảnh đại diện</label>
                                            <img id="img-preview" width="100%" src="{{ asset('/assets/img/profiles/AvatarSinhVien') }}/{{ Auth::guard('student')->user()->avatar }}" class="mr-3"
                                            alt="avatar sinh viên">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Ảnh đại diện</label>
                                            <input id="input-img" name="avatar" class="form-control" type="file">
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                                            <a href="{{ route("student.info.index") }}">
                                                <button type="button" class="btn btn-light btn-sm">Trở lại</button>
                                            </a>
                                        </div>
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
