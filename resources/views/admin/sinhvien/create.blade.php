@extends('layouts.admin')

@section('style')
    {{-- css --}}
@endsection

@section('script')
    {{-- style --}}
@endsection

@section('content')
    <div class="page-wrapper" style="min-height: 387px;">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{ $page }}</h3>
                    </div>
                    <div class="col-auto text-right float-right ml-auto">
                        <a href="{{ route('admin.upload.index', 'sinh_viens') }}" class="btn btn-outline-primary mr-2"><i class="fas fa-plus"></i> Thêm bằng excel</a>
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
                            <form method="POST" action="{{ route('admin.sinh_vien.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Thông tin cá nhân của sinh viên</span></h5>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Họ Tên</label>
                                            <input type="text" name="ho_ten" placeholder="họ và tên" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Giới tính</label>
                                            <select name="gioi_tinh" class="form-control" required>
                                                <option value="1">Nam</option>
                                                <option value="0">Nữ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Sinh Ngày</label>
                                            <input name="ngay_sinh" type="date" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Số điện thoại</label>
                                            <input name="so_dien_thoai" type="text" placeholder="nhập số điện thoại" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Chuyên ngành</label>
                                            <select name="chuyen_nganh" class="form-control" required>
                                                <option disabled selected>-- Lựa chọn chuyên ngành --</option>
                                                @foreach ($chuyen_nganhs as $chuyen_nganh)
                                                    <option value="{{ $chuyen_nganh->ma_chuyen_nganh }},{{ $chuyen_nganh->ma_khoa }}">{{ $chuyen_nganh->ten_chuyen_nganh }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Ảnh đại diện</label>
                                            <input name="avatar" class="form-control" type="file">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <input name="dia_chi" placeholder="địa điểm nơi ở" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Thêm sinh viên</button>
                                        <a href="{{ route("admin.giang_vien.index") }}">
                                            <button type="button" class="btn btn-light">
                                                Trở lại
                                            </button>
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
