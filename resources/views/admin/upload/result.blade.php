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
                </div>
                <a href="{{ route('admin.home') }}">
                    <button type="button" class="btn btn-danger">Trở về</button>
                </a>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="my-table" class="table table-hover mb-0 datatable">
                                    <thead>
                                        <tr class="text-center">
                                            @foreach ($data[0] as $data_header)
                                                <td>
                                                    {{ $data_header }}
                                                </td>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 1; $i < count($data); $i++)
                                            <tr>
                                                @foreach ($data[$i] as $data_row)
                                                    @if ($data_row == 'Đã Thêm')
                                                        <td class="text-center text-info">
                                                            {{ $data_row}}
                                                        </td>
                                                    @elseif ($data_row == 'Đã tồn tại' || $data_row == 'Lỗi khóa ngoại')
                                                        <td class="text-center text-danger">
                                                            {{ $data_row }}
                                                        </td>
                                                    @else
                                                        <td class="text-center"> 
                                                            {{ $data_row }}
                                                        </td>
                                                    @endif
                                                @endforeach
                                            </tr>
                                        @endfor
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
