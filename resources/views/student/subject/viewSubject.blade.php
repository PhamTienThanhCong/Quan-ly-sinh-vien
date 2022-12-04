{{-- change password --}}
@extends('layouts.student')

@section('style')
    {{-- css --}}
@endsection

@section('script')
    {{-- js --}}
@endsection

@section('content')
    <div class="page-wrapper" style="min-height: 387px;">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{ $page }}</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">{{ $page }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-nowrap mb-0">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Mã môn học</th>
                                            <th>Tên môn học</th>
                                            <th>Kì học</th>
                                            <th>Số tín chỉ</th>
                                            <th>Loại</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mon_hocs as $mon_hoc)
                                            <tr class="text-center">
                                                <td>{{ $mon_hoc->ma_mon_hoc }}</td>
                                                <td class="text-left">{{ $mon_hoc->ten_mon_hoc }}</td>
                                                <td>{{ $mon_hoc->ki_hoc }}</td>
                                                <td>{{ $mon_hoc->so_tin_chi }}</td>
                                                <td>
                                                    @if ($mon_hoc->ma_khoa != "")
                                                        Chuyên ngành
                                                    @else
                                                        Đại cương
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
