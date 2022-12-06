@extends('layouts.student')

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
                'ordering': true,
                'autoWidth': false
            })
        })
        function dang_ki(ten_mon_hoc) {
            swal({
                title: 'Bạn có chắc chắn đăng kí môn học này?',
                text: ten_mon_hoc,
                icon: 'warning',
                buttons: {
                    cancel: {
                        text: 'Hủy',
                        value: null,
                        visible: true,
                        className: 'btn btn-danger',
                        closeModal: true,
                    },
                    confirm: {
                        text: 'Đăng kí',
                        value: true,
                        visible: true,
                        className: 'btn btn-success',
                        closeModal: true
                    }
                }
            }).then((isConfirm) => {
                if (isConfirm) {
                    swal({
                        title: 'Đăng kí thành công!',
                        text: 'Bạn đã đăng kí thành công môn học: ' + ten_mon_hoc,
                        icon: 'success',
                        buttons: {
                            confirm: {
                                text: 'OK',
                                value: true,
                                visible: true,
                                className: 'btn btn-success',
                                closeModal: true
                            }
                        }
                    })
                }
            })
        }
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5 class="card-title">Danh sách lớp học</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (count($lop_hocs) > 1)
                                <div class="table-responsive">
                                    <table class="table table-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th>Hành Động</th>
                                                <th>Môn học</th>
                                                <th>Tín Chỉ</th>
                                                <th>Thời Gian</th>
                                                <th>Phòng</th>
                                                <th>Giảng Viên</th>       
                                                <th>Bắt đầu</th>
                                                <th>Kết thúc</th>
                                                <th>Số lượng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($lop_hocs as $lop)
                                                <tr>
                                                    <td>
                                                        @if ($lop->dang_ki == false)
                                                            <a href="{{ route("student.subjectRegisterProcess", $lop->id) }}">
                                                                <button class="btn btn-info btn-sm">
                                                                    <i class="fas fa-edit"></i>
                                                                    Đăng kí
                                                                </button>
                                                            </a>
                                                        @else
                                                            <a href="{{ route("student.subjectRegisterCancel", $lop->id) }}">
                                                                <button class="btn btn-danger btn-sm">
                                                                    <i class="fas fa-edit"></i>
                                                                    Hủy hăng kí
                                                                </button>
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.ki_hoc.view_class.detail', $lop->id) }}">
                                                            {{ $lop->ten_mon_hoc }}
                                                        </a>
                                                    </td>
                                                    <td>{{ $lop->so_tin_chi }}</td>
                                                    <td>
                                                        Thứ: {{ $lop->ngay_trong_tuan }} 
                                                        <br>
                                                        Tiết: {{ $lop->tiet_bat_dau }}
                                                        - {{ $lop->tiet_bat_dau + $lop->so_tiet }}
                                                    </td>
                                                    <td>
                                                        Phòng: {{ $lop->phong_hoc }}
                                                    </td>
                                                    <td>
                                                        {{-- viết hoa từng chữ cái đầu --}}
                                                        {{ ucwords($lop->ho_ten) }}
                                                    </td>
                                                    <td>
                                                        {{ date('d-m-Y', strtotime($lop->ngay_bat_dau)) }}
                                                    </td>
                                                    <td>
                                                        {{ date('d-m-Y', strtotime($lop->ngay_bat_dau)) }}
                                                    </td>
                                                    <td>
                                                        {{ $lop->so_luong_dang_ki }} / 60
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <h4 class="text-center">
                                    Chưa có lịch đăng kí vui lòng quay lại sau
                                </h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
