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
                <div class="row mt-3">

                    <div class="col-auto text-right float-right ml-auto">
                        <a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a>
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
                                            <th>Khóa</th>
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
                                                <td>
                                                    {{ $sinh_vien->sv_khoa }}
                                                </td>
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
                                                                src="{{ asset('assets/img/profiles') }}/{{ $sinh_vien['avatar'] }}"
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
                                                        $sinh_vien['ma_lop']
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
