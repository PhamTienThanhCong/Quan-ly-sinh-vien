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
                        <a href="{{ route('admin.chuyen_nganh.them') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                                            <th>Mã Ngành</th>
                                            <th>Tên Ngành</th>
                                            <th>Mã Khoa</th>
                                            <th>Tên khoa</th>
                                            <th>Tổng Sinh Viên</th>
                                            <th>Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($chuyenNganhs as $Nganh)
                                            <tr class="text-center">
                                                <td>{{ $Nganh['ma_chuyen_nganh'] }}</td>
                                                <td>{{ $Nganh['ten_chuyen_nganh'] }}</td>
                                                <td>{{ $Nganh['ma_khoa'] }}</td>
                                                <td>{{ $Nganh['ten_khoa'] }}</td>
                                                <td>{{ $Nganh['sinh_vien'] }}</td>
                                                <td>
                                                    <div class="actions">
                                                        <a href="{{ route('admin.chuyen_nganh.sua', $Nganh['ma_chuyen_nganh']) }}" class="btn btn-sm bg-success-light mr-2">
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
