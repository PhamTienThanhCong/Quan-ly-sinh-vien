@extends('layouts.student')

@section('style')
    {{-- css --}}
@endsection

@section('script')
    {{-- style --}}
@endsection

@section('content')
    <div class="page-wrapper" style="min-height: 657px;">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">{{ $page }}</h3>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="about-info">
                                <h4>Thông tin</h4>
                                <div class="media mt-3">
                                    {{-- img --}}
                                    <img src="{{ asset('/assets/img/profiles/AvatarSinhVien') }}/{{ Auth::guard('student')->user()->avatar }}" class="mr-3"
                                        alt="avatar sinh viên">
                                    <div class="media-body">
                                        <ul>
                                            <li>
                                                <span class="title-span">Mã sinh viên: </span>
                                                <span class="info-span"> {{ Auth::guard('student')->user()->ma_sinh_vien }} </span>
                                            </li>
                                            <li>
                                                <span class="title-span">Họ và tên: </span>
                                                <span class="info-span"> {{ Auth::guard('student')->user()->ho_ten }} </span>
                                            </li>
                                            <li>
                                                <span class="title-span">Giới tính : </span>
                                                <span class="info-span"> {{ Auth::guard('student')->user()->gioi_tinh ? 'Nam' : 'Nữ' }} </span>
                                            </li>
                                            <li>
                                                <span class="title-span">Ngày sinh : </span>
                                                <span class="info-span">
                                                    {{ date('d-m-Y', strtotime(Auth::guard('student')->user()->ngay_sinh)) }} </span>
                                            </li>
                                            <li>
                                                <span class="title-span">Email : </span>
                                                <span class="info-span"> {{ Auth::guard('student')->user()->email }} </span>
                                            </li>
                                            <li>
                                                <span class="title-span">Số điện thoại : </span>
                                                <span class="info-span"> {{ Auth::guard('student')->user()->so_dien_thoai }} </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <p>
                                            Địa chỉ: {{ Auth::guard('student')->user()->dia_chi }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="skill-info">
                                <h4>Học vấn</h4>
                                <ul class="ml-2">
                                    <li>
                                        <span class="title-span">Khóa: </span>
                                        <span class="info-span"> <span class="text-info">{{ $sinh_vien->sv_khoa }}</span> -
                                            năm bắt đầu: {{ $sinh_vien->nam_bat_dau }} </span>
                                    </li>
                                    <li>
                                        <span class="title-span">Lớp: </span>
                                        <span class="info-span"> <span class="text-info">{{ $sinh_vien->ma_lop }}</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="title-span">Khoa: </span>
                                        <span class="info-span"> <span
                                                class="text-info">{{ $get_chuyen_nganh->ma_khoa }}</span> -
                                            {{ $get_chuyen_nganh->ten_khoa }} </span>
                                    </li>
                                    <li>
                                        <span class="title-span">Chuyên ngành: </span>
                                        <span class="info-span"> <span
                                                class="text-info">{{ $get_chuyen_nganh->ma_chuyen_nganh }}</span> -
                                            {{ $get_chuyen_nganh->ten_chuyen_nganh }} </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="skill-info">
                                <h4>Cài đặt</h4>
                                <a href="{{ route('student.info.edit') }}">
                                    <button type="button" class="btn btn-info">Sửa thông tin sinh viên</button>
                                </a>
                                <a href="{{ route('student.info.changePassword') }}">
                                    <button type="button" class="btn btn-danger">Đổi mật khẩu</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <p>Copyright © 2020 Dreamguys.</p>
        </footer>

    </div>
@endsection