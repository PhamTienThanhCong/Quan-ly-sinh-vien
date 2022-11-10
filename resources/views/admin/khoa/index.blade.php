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
                        <a href="{{ route('admin.them_khoa') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                                            <th>Mã Khoa</th>
                                            <th>Tên Khoa</th>
                                            <th>Tổng Sinh Viên</th>
                                            <th>Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($khoas as $khoa)
                                            <tr class="text-center">
                                                <td>{{ $khoa['ma_khoa'] }}</td>
                                                <td>{{ $khoa['ten_khoa'] }}</td>
                                                <td>{{ $khoa['sinh_vien'] }}</td>
                                                <td>
                                                    <div class="actions">
                                                        <a href="{{ route('admin.sua_khoa', $khoa['ma_khoa']) }}" class="btn btn-sm bg-success-light mr-2">
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
