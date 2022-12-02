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
                "lengthMenu": [25, 50, 75, 100 , 200],
                'searching': true,
                'ordering': false,
                'autoWidth': false
            })
        })
    </script>
    <script>
        // if count($sinh_viens) == 0 swal error
        if ({{ count($sinh_viens) }} == 0) {
            swal({
                icon: 'error',
                title: 'Lỗi tìm kiếm !',
                text: 'Không có sinh viên nào phù hợp với điều kiện !',
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
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Hiển thị: {{ count($sinh_viens) }} / {{ $count_sv }} sinh viên</li>
                        </ul>
                    </div>
                    <div class="col-auto text-right float-right ml-auto">
                        <a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Lọc sinh viên</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route("admin.sinh_vien.khoa") }}" method="GET">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Lọc theo khóa</label>
                                        <div class="col-md-10">
                                            <select class="form-control" name="sv_khoa">
                                                <option value="">-- Chọn khóa --</option>
                                                @foreach ($sv_khoas as $data)
                                                    <option value="{{ $data->ma_khoa_hoc }}" {{ $data->ma_khoa_hoc == $sv_khoa ? 'selected' : '' }}>{{ $data->ma_khoa_hoc }} - {{ $data->nam_bat_dau }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Lọc theo khoa</label>
                                        <div class="col-md-10">
                                            <select class="form-control" name="khoa">
                                                <option value="">-- Chọn khoa --</option>
                                                @foreach ($khoas as $data)
                                                    <option value="{{ $data->ma_khoa }}" {{ $data->ma_khoa == $khoa ? 'selected' : '' }}>{{ $data->ten_khoa }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @if (count($chuyen_nganhs))
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">Lọc theo ngành</label>
                                            <div class="col-md-10">
                                                <select class="form-control" name="nganh">
                                                    <option value="">-- Chọn ngành --</option>
                                                    @foreach ($chuyen_nganhs as $data)
                                                        <option value="{{ $data->ma_chuyen_nganh }}" {{ $data->ma_chuyen_nganh == $nganh ? 'selected' : '' }}>{{ $data->ten_chuyen_nganh }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                    @if (count($lops))
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">Lọc theo lớp</label>
                                            <div class="col-md-10">
                                                <select class="form-control" name="lop">
                                                    <option value="">-- Chọn lớp --</option>
                                                    @foreach ($lops as $data)
                                                        <option value="{{ $data->ma_lop }}" {{ $data->ma_lop == $lop ? 'selected' : '' }}>{{ $data->ma_lop }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="text-right">
                                        <a href="{{ route('admin.sinh_vien.khoa') }}" class="btn btn-danger">Clear</a>
                                        <button type="submit" class="btn btn-info">Tìm kiếm</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
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
                                            <th>MSSV</th>
                                            <th>Họ tên</th>
                                            <th>Giới tính</th>
                                            <th>Ngày sinh</th>
                                            <th>Lớp</th>
                                            <th>Khoa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sinh_viens as $sinh_vien)
                                            <tr class="text-center">
                                                <td>
                                                    {{ $sinh_vien->sv_khoa }}
                                                </td>
                                                <td>
                                                    {{ $sinh_vien['ma_sinh_vien'] }}
                                                </td>
                                                <td class="text-left">
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route("admin.sinh_vien.show", $sinh_vien->ma_sinh_vien) }}" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="{{ asset('assets/img/profiles/AvatarSinhVien') }}/{{ $sinh_vien['avatar'] }}"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="{{ route("admin.sinh_vien.show", $sinh_vien->ma_sinh_vien) }}">{{ $sinh_vien['ho_ten'] }}</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    {{ $sinh_vien['gioi_tinh']? 'Nam' : 'Nữ' }}
                                                </td>
                                                <td>
                                                    {{-- ngay sinh fomat --}}
                                                    {{ date('d-m-Y', strtotime($sinh_vien['ngay_sinh'])) }}
                                                </td>
                                                <td>
                                                    {{ $sinh_vien['ma_khoa'] }} - {{ $sinh_vien['ma_chuyen_nganh'] }}
                                                </td>  
                                                <td>
                                                    {{-- if lop == null return chưa chia --}}
                                                    @if ($sinh_vien['ma_lop'] == null)
                                                        Chưa chia
                                                    @else
                                                        {{ $sinh_vien['ma_lop'] }}
                                                    @endif
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
