@extends('layouts.admin')

@section('style')
    {{-- css --}}
@endsection

@section('script')
    {{-- style --}}
@endsection

@section('content')
    <div class="page-wrapper" style="min-height: 657px;">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Thêm môn học</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            @if (count($errors) > 0)
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-danger"> {{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <form method="POST" action="{{ route("admin.mon_hoc.store") }}">
                                <div class="row">
                                    @csrf
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Thông tin môn học</span></h5>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Mã môn học</label>
                                            <input name="ma_mon_hoc" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Tên môn học</label>
                                            <input name="ten_mon_hoc" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Số Tín chỉ</label>
                                            <input name="so_tin_chi" type="number" value="3" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Thuộc khoa</label>
                                            <select name="ma_khoa" class="form-control">
                                                <option value="1">Môn học chung</option>
                                                @foreach ($khoas as $khoa)
                                                    <option value="{{ $khoa['ma_khoa'] }}">Khoa {{ $khoa['ten_khoa'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route("admin.mon_hoc.index") }}">
                                            <button type="button" class="btn btn-light">
                                                Trở lại
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
