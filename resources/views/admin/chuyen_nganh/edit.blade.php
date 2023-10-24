@extends('layouts.admin')

@section('style')
    {{-- css --}}
@endsection

@section('script')
    {{-- style --}}
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
                        <div class="card-body">
                            @if (count($errors) > 0)
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-danger"> {{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <form action="{{ route('admin.chuyen_nganh.sua_process', $chuyenNganh['ma_chuyen_nganh']) }}" method="POST">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Thông tin về chuyên ngành</span></h5>
                                    </div>
                                    @csrf
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Mã Ngành</label>
                                            <input value="{{ $chuyenNganh['ma_chuyen_nganh'] }}" type="text"
                                                class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Tên Tên ngành</label>
                                            <input value="{{ $chuyenNganh['ten_chuyen_nganh'] }}" type="text"
                                                class="form-control" name="ten_chuyen_nganh">
                                        </div>
                                    </div>
                                    <div class="col-10 col-sm-12">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label class="col-form-label">Thuộc khoa</label>
                                                <select class="form-control" name="ma_khoa">
                                                    <option disabled selected>-- Lựa chọn chuyên ngành --</option>
                                                    @foreach ($khoas as $khoa)
                                                        <option 
                                                            value="{{ $khoa['ma_khoa'] }}" 
                                                            {{ $khoa['ma_khoa'] == $chuyenNganh['ma_khoa'] ? 'selected' : '' }}
                                                            >{{ $khoa['ten_khoa'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <a href="{{ route('admin.chuyen_nganh') }}">
                                            <button type="button" class="btn btn-light">Trở về</button>
                                        </a>
                                        <button type="submit" class="btn btn-primary">Sửa chuyên ngành</button>
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
