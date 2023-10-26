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
                    <div class="col-auto text-right float-right ml-auto">
                        <a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a>
                        <a href="{{ route('admin.giang_vien.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                    </div>
                </div>
            </div>

            <div class="row">
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
                                            <th>Trình độ</th>
                                            <th>Chuyên môn</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach ($giangviens as $giangvien)
                                            <tr class="text-center">
                                                <td>{{ $giangvien['ma_giang_vien'] }}</td>
                                                <td>
                                                    {{ $giangvien['ma_khoa'] }}
                                                </td>
                                                <td class="text-left">
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route('admin.giang_vien.show', $giangvien['ma_giang_vien']) }}" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="{{ asset('assets/img/profiles/AvatarGiangVien') }}/{{ $giangvien['avatar'] }}"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="{{ route('admin.giang_vien.show', $giangvien['ma_giang_vien']) }}">{{ $giangvien['ho_ten'] }}</a>
                                                    </h2>
                                                </td>
                                                <td class="text-left">
                                                    {{ $giangvien['email'] }}
                                                </td>
                                                <td>
                                                    {{ $giangvien['hoc_van'] }}
                                                </td>
                                                <td>
                                                    {{ $giangvien['chuyen_mon'] }}
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
