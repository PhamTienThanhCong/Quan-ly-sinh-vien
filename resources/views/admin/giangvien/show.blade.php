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
                                    <img src="{{ asset('assets/img/profiles/AvatarGiangVien') }}/{{ $giangvien['avatar'] }}" class="mr-3" alt="...">
                                    <div class="media-body">
                                        <ul>
                                            <li>
                                                <span class="title-span">Họ và tên: </span>
                                                <span class="info-span"> {{ $giangvien->ho_ten }} </span>
                                            </li>
                                            <li>
                                                <span class="title-span">Khoa : </span>
                                                <span class="info-span"> {{ $giangvien->ma_khoa }} </span>
                                            </li>
                                            <li>
                                                <span class="title-span">Số điện thoại : </span>
                                                <span class="info-span"> {{ $giangvien->so_dien_thoai }} </span>
                                            </li>
                                            <li>
                                                <span class="title-span">Email : </span>
                                                <span class="info-span"> {{ $giangvien->email }} </span>
                                            </li>
                                            <li>
                                                <span class="title-span">Giới tính : </span>
                                                <span class="info-span"> {{ $giangvien->gioi_tinh }} </span>
                                            </li>
                                            <li>
                                                <span class="title-span">Ngày sinh : </span>
                                                <span class="info-span"> {{ date('d-m-Y', strtotime($giangvien->sinh_nhat)) }} </span>
                                            </li>
                                            <li>
                                                <span class="title-span">Địa chỉ : </span>
                                                <span class="info-span"> {{ $giangvien->dia_chi }} </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <p>
                                            {{ $giangvien->ghi_chu }}
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
                                <p>
                                    {{ $giangvien->hoc_van }}
                                </p>
                                
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <h5>Education</h5>
                                        <p class="mt-3">
                                            {{ $giangvien->chuyen_mon }}
                                        </p>
                                        
                                    </div>
                                </div>
        
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="skill-info">
                                <h4>Settings</h4>
                                <a href="{{ route("admin.giang_vien.index") }}">
                                    <button type="button" class="btn btn-light">
                                        Trở lại
                                    </button>
                                </a>
                                <a href="{{ route("admin.giang_vien.edit", $giangvien->ma_giang_vien) }}">
                                    <button type="button" class="btn btn-info">Sửa thông tin</button>
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
