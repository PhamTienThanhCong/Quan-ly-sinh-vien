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
                        <a href="{{ route('admin.mon_hoc.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                                                <td>{{ $mon_hoc['ten_mon_hoc'] }}</td>
                                                <td>{{ $mon_hoc['so_tin_chi'] }} tín chỉ</td>
                                                <td>
                                                    @if ( $mon_hoc['ten_khoa'] == null)
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
