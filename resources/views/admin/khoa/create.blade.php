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
                            @if (count($errors) >0)
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li class="text-danger"> {{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <form action="{{ route('admin.them_khoa_process') }}" method="POST">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Thông tin về khoa</span></h5>
                                    </div>
                                    @csrf
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Mã Khoa</label>
                                            <input value="{{ old('ma_khoa') }}" name="ma_khoa" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Tên Chi tết</label>
                                            <input value="{{ old('ten_khoa') }}" name="ten_khoa" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <a href="{{ route('admin.danh_sach_khoa') }}">
                                            <button type="button" class="btn btn-light">Trở về</button>
                                        </a>
                                        <button type="submit" class="btn btn-primary">Tạo khoa</button>
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
