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
                        <form action="{{ route('admin.upload.update', $table) }}" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Lựa chọn tệp tin để upload</span></h5>
                                </div>
                                @csrf
                                <div class="col-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Lựa chọn tệp tin để xử lý</label>
                                        <input class="form-control" type="file" name="file">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <a href="javascript:history.back()">
                                        <button type="button" class="btn btn-light">Trở về</button>
                                    </a>
                                    <button type="submit" class="btn btn-primary">Xử lý</button>
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