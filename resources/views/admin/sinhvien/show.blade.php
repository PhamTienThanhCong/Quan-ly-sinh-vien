@extends('layouts.admin')

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
                        <a href="{{ route('admin.sinh_vien.khoa') }}?sv_khoa={{ $sinh_vien->sv_khoa }}&khoa={{ $sinh_vien->ma_khoa }}"
                            class="btn-link">Trở lại</a>
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
                                    <img src="{{ asset('assets/img/profiles') }}/{{ $sinh_vien['avatar'] }}" class="mr-3"
                                        alt="...">
                                    <div class="media-body">
                                        <ul>
                                            <li>
                                                <span class="title-span">Mã sinh viên: </span>
                                                <span class="info-span"> {{ $sinh_vien->ma_sinh_vien }} </span>
                                            </li>
                                            <li>
                                                <span class="title-span">Họ và tên: </span>
                                                <span class="info-span"> {{ $sinh_vien->ho_ten }} </span>
                                            </li>
                                            <li>
                                                <span class="title-span">Giới tính : </span>
                                                <span class="info-span"> {{ $sinh_vien->gioi_tinh ? 'Nam' : 'Nữ' }} </span>
                                            </li>
                                            <li>
                                                <span class="title-span">Ngày sinh : </span>
                                                <span class="info-span">
                                                    {{ date('d-m-Y', strtotime($sinh_vien->ngay_sinh)) }} </span>
                                            </li>
                                            <li>
                                                <span class="title-span">Email : </span>
                                                <span class="info-span"> {{ $sinh_vien->email }} </span>
                                            </li>
                                            <li>
                                                <span class="title-span">Số điện thoại : </span>
                                                <span class="info-span"> {{ $sinh_vien->so_dien_thoai }} </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <p>
                                            Địa chỉ: {{ $sinh_vien->dia_chi }}
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
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <h5>Quá trình học</h5>
                            <p class="mt-3">1st Prise in Running Competition.</p>
                            <p>Lorem Ipsum is simply dummy text.</p>
                            <p>Won overall star student in higher secondary education.</p>
                            <p>Lorem Ipsum is simply dummy text.</p>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="skill-info">
                                <h4>Cài đặt</h4>
                                <a href="{{ route('admin.giang_vien.index') }}">
                                    <button type="button" class="btn btn-light">
                                        Trở lại
                                    </button>
                                </a>
                                <a href="">
                                    <button type="button" class="btn btn-info">Sửa thông tin sinh viên</button>
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
