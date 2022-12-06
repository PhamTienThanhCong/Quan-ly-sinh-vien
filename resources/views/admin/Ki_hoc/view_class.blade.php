@extends('layouts.admin')

@section('style')
    {{-- css --}}
@endsection

@section('script')
    <script>
         $(function() {
            $('#my-table').DataTable({
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': false,
                'autoWidth': false
            })
        })
    </script>
@endsection

@section('content')
    <div class="page-wrapper" style="min-height: 657px;">
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
                        <div class="card-header">
                            <h5 class="card-title">Thông tin tổng quan về lớp</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <p>
                                        Mã lớp học: {{ $lop_hocs->id }}
                                    </p>
                                    <p>
                                        Môn học: {{ $lop_hocs->ten_mon_hoc }}
                                    </p>
                                    <p>
                                        Giảng viên phụ trách: {{ ucwords($lop_hocs->ho_ten) }}
                                    </p>
                                    <p>
                                        Phòng học: {{ $lop_hocs->phong_hoc }}
                                    </p>
                                    <p>
                                        Thời gian học: Thứ {{ $lop_hocs->ngay_trong_tuan }} - Tiết: {{ $lop_hocs->tiet_bat_dau }} - {{ $lop_hocs->tiet_bat_dau + $lop_hocs->so_tiet }}
                                    </p>
                                    <p>
                                        Thời gian: {{ date('d-m-Y', strtotime($lop_hocs->ngay_bat_dau)) }} - {{ date('d-m-Y', strtotime($lop_hocs->ngay_ket_thuc)) }}
                                    </p>
                                    <p>
                                        Tổng sinh viên tham gia: {{ count($sinh_vien_dks) }} sinh viên
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="my-table" class="table table-hover table-center mb-0 datatable dataTable no-footer">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Khoa</th>
                                            <th>Mã giảng viên</th>
                                            <th>Họ tên</th>
                                            <th>Email</th>
                                            <th>Quyền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td>
                                                {{ $lop_hocs->ma_khoa }}
                                            </td>
                                            <td>
                                                {{ $lop_hocs->ma_giang_vien }}
                                            </td>
                                            <td class="text-left">
                                                <h2 class="table-avatar">
                                                    <a href="{{ route('admin.giang_vien.show', $lop_hocs->ma_giang_vien) }}" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{ asset('assets/img/profiles/AvatarGiangVien') }}/{{ $lop_hocs->avatar }}"
                                                            alt="User Image">
                                                    </a>
                                                    <a href="{{ route('admin.giang_vien.show', $lop_hocs->ma_giang_vien) }}">{{ $lop_hocs->ho_ten }}</a>
                                                </h2>
                                            </td>
                                            <td>
                                                {{ $lop_hocs->email }}
                                            </td>
                                            <td>
                                                Giảng Viên
                                            </td>
                                        </tr>
                                        @foreach ($sinh_vien_dks as $sinh_vien)
                                            <td>
                                                {{ $sinh_vien->ma_khoa }}
                                            </td>
                                            <td>
                                                {{ $sinh_vien->ma_sinh_vien }}
                                            </td>
                                            <td class="text-left">
                                                <h2 class="table-avatar">
                                                    <a href="{{ route('admin.sinh_vien.show', $sinh_vien->ma_sinh_vien) }}" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{ asset('assets/img/profiles/AvatarSinhVien') }}/{{ $sinh_vien->avatar }}"
                                                            alt="User Image">
                                                    </a>
                                                    <a href="{{ route('admin.sinh_vien.show', $sinh_vien->ma_sinh_vien ) }}">{{ $sinh_vien->ho_ten }}</a>
                                                </h2>
                                            </td>
                                            <td>
                                                {{ $sinh_vien->email }}
                                            </td>
                                            <td>
                                                sinh viên
                                            </td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
