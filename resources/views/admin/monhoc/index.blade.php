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
                'ordering': true,
                'autoWidth': false
            })
        })
        let number =  count($mon_hocs) 
        if (number == 0) {
            $('#my-table').hide()
            swal({
                title: "Không có môn học nào",
                text: "Vui lòng thêm môn học",
                icon: "warning",
                button: "OK",
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
                    <div class="col-auto text-right float-right ml-auto">
                        <a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a>
                        <a href="{{ route('admin.mon_hoc.create') }}" class="btn btn-primary"><i
                                class="fas fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Lọc sinh viên</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.mon_hoc.index') }}" method="GET">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Lọc theo Khoa</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="khoa">
                                            <option value="">-- Chọn khoa --</option>
                                            <option value="chung"
                                                {{ "chung" == $search_khoa ? 'selected' : '' }}>
                                                Chung
                                            </option>
                                            @foreach ($khoas as $khoa)
                                                <option value="{{ $khoa->ma_khoa }}"
                                                    {{ $khoa->ma_khoa == $search_khoa ? 'selected' : '' }}>
                                                    {{ $khoa->ten_khoa }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">Tìm kiếm</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="my-table" class="table table-hover mb-0 datatable">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Mã môn học</th>
                                            <th>Tên môn học</th>
                                            <th>Số tín chỉ</th>
                                            <th>Khoa</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mon_hocs as $mon_hoc)
                                            <tr class="text-center">
                                                <td>{{ $mon_hoc['ma_mon_hoc'] }}</td>
                                                <td>
                                                    <a href="{{ route('admin.mon_hoc.edit', $mon_hoc['ma_mon_hoc']) }}">
                                                        {{ $mon_hoc['ten_mon_hoc'] }}
                                                    </a>
                                                </td>
                                                <td>{{ $mon_hoc['so_tin_chi'] }} tín chỉ</td>
                                                <td>
                                                    @if ($mon_hoc['ten_khoa'] == null)
                                                        Môn học chuyên ngành
                                                    @else
                                                        {{ $mon_hoc['ten_khoa'] }}
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="actions">
                                                        <a href="" class="btn btn-sm bg-success-light mr-2">
                                                            <i class="fas fa-pen" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
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
