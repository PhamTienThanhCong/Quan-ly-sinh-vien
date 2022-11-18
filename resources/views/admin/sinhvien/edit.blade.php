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
                            <form method="POST" action="{{ route('admin.giang_vien.update', $giangvien->ma_giang_vien) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Thông tin cá nhân của giảng viên</span></h5>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Họ Tên</label>
                                            <input type="text" name="ho_ten" value="{{ $giangvien->ho_ten }}" placeholder="họ và tên" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Giới tính</label>
                                            <select name="gioi_tinh" class="form-control" required>
                                                <option value="1" {{ $giangvien->gioi_tinh == 'Nam' ? 'selected' : '' }}>Nam</option>
                                                <option value="0" {{ $giangvien->gioi_tinh == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Sinh Ngày</label>
                                            {{-- format to y-m-d --}}
                                            <input name="sinh_nhat" type="date" value="{{ $giangvien->sinh_nhat }}" class="form-control" required>

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Số điện thoại</label>
                                            <input type="text" name="so_dien_thoai" value="{{ $giangvien->so_dien_thoai }}" placeholder="số điện thoại" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label>Nhập địa chỉ email</label>
                                        <div class="input-group">
                                            <input type="text" value="{{ $giangvien->email }}" placeholder="email" class="form-control" readonly>
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
                                            <input type="text" name="dia_chi" value="{{ $giangvien->dia_chi }}" placeholder="địa chỉ" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Thông tin chuyên môn</span></h5>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Mã giảng viên</label>
                                            <input type="text" value="{{ $giangvien->ma_giang_vien }}" placeholder="mã giảng viên" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Khoa</label>
                                            <select name="ma_khoa" class="form-control" required>
                                                <option disabled selected>-- Lựa chọn khoa --</option>
                                                @foreach ($khoas as $khoa)
                                                    <option value="{{ $khoa->ma_khoa }}" {{ $giangvien->ma_khoa == $khoa->ma_khoa ? 'selected' : '' }}>{{ $khoa->ten_khoa }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Học Vấn</label>
                                            <select name="hoc_van" class="form-control">                                                
                                                <option>-- Lựa chọn trình độ --</option>
                                                <option value="Thạc Sĩ" {{ $giangvien->hoc_van == 'Thạc Sĩ' ? 'selected' : '' }}>Thạc Sĩ</option>
                                                <option value="Tiến Sĩ" {{ $giangvien->hoc_van == 'Tiến Sĩ' ? 'selected' : '' }}>Tiến Sĩ</option>
                                                <option value="Phó giáo sư" {{ $giangvien->hoc_van == 'Phó giáo sư' ? 'selected' : '' }}>Phó giáo sư</option>
                                                <option value="Giáo sư" {{ $giangvien->hoc_van == 'Giáo sư' ? 'selected' : '' }}>Giáo sư</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Chuyên môn</label>
                                            <input type="text" name="chuyen_mon" value="{{ $giangvien->chuyen_mon }}" placeholder="chuyên môn" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Ghi chú</label>
                                            <textarea name="ghi_chu" class="form-control" rows="5" placeholder="ghi chú">{{ $giangvien->ghi_chu }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Cập nhâp giảng viên</button>
                                        <a href="{{ route("admin.giang_vien.index") }}">
                                            <button type="button" class="btn btn-light">
                                                Trở lại
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <a href="{{ route('admin.giang_vien.destroy', $giangvien->ma_giang_vien ) }}">
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                                Xóa giảng viên
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
