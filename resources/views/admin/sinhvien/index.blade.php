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
        @if ($check_tao_khoa_hoc)
            swal("Ôi khôngggg", "Đã đến kì học mới admin hãy tạo mới ngay", "warning");
        @endif
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
                <div class="row mt-3">
                    <div class="col-md-12">
                        <p class="mt-3">Số lượng sinh viên khóa {{ $khoa_hoc->ma_khoa_hoc }} có: {{ count($sinh_viens) }}
                            sinh viên</p>
                        <p>
                            Số lượng sinh viên chưa được chia lớp là: {{ $count_sinh_vien }} sinh viên.
                            @if ($count_sinh_vien > 0)
                                <a href="#" class="text-danger"> Chia lớp ngay</a>
                            @endif
                        </p>
                        @if (!$check_tao_sinh_vien)
                            <p class="text-danger">
                                Hết hạn thời gian thêm sinh viên mới
                            </p>
                        @endif
                        @if ($check_tao_khoa_hoc)
                            <p class="text-danger">
                                Đã bắt đầu 1 kì học mới admin hãy
                                <a href="#">
                                    <button type="button" class="btn btn-danger">thêm kì học mới ngay <span
                                            class="spinner-border spinner-border-sm mr-2" role="status"></span></button>
                                </a>
                            </p>
                            {{-- import csv --}}
                        @endif
                    </div>
                    <div class="col-auto text-right float-right ml-auto">
                        <a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a>
                        @if ($check_tao_sinh_vien)
                            <a href="{{ route('admin.sinh_vien.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="my-table"
                                    class="table table-hover table-center mb-0 datatable dataTable no-footer">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Khoa</th>
                                            <th>Ngành</th>
                                            <th>MSSV</th>
                                            <th>Họ tên</th>
                                            <th>Email</th>
                                            <th>Lớp</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sinh_viens as $sinh_vien)
                                            <tr class="text-center">
                                                <td>{{ $sinh_vien['ma_khoa'] }}</td>
                                                <td>
                                                    {{ $sinh_vien['ma_chuyen_nganh'] }}
                                                </td>
                                                <td>
                                                    {{ $sinh_vien['ma_sinh_vien'] }}
                                                </td>
                                                <td class="text-left">
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="{{ asset('assets/img/profiles/AvatarSinhVien') }}/{{ $sinh_vien['avatar'] }}"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="">{{ $sinh_vien['ho_ten'] }}</a>
                                                    </h2>
                                                </td>
                                                <td class="text-left">
                                                    {{ $sinh_vien['email'] }}
                                                </td>
                                                <td>
                                                    {{-- if lop == null return chưa chia --}}
                                                    @if ($sinh_vien['ma_lop'] == null)
                                                        Chưa chia
                                                    @else
                                                        {{ $sinh_vien['ma_lop'] }}
                                                    @endif
                                                </td>
                                                <td>

                                                </td>
                                            </tr>
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
