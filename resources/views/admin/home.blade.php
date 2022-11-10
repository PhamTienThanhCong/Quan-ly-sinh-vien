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
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Xin chào {{ Auth::guard('admin')->user()->username }} !</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard của quản trị viên</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-one w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-icon">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <div class="db-info">
                                    <h3>K14</h3>
                                    <h6>Khóa học</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-one w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-icon">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <div class="db-info">
                                    <h3>5055</h3>
                                    <h6>Tổng Sinh Viên</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-two w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-icon">
                                    <i class="fas fa-crown"></i>
                                </div>
                                <div class="db-info">
                                    <h3>200</h3>
                                    <h6>Giảng viên</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-four w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-icon">
                                    <i class="fas fa-file-invoice-dollar"></i>
                                </div>
                                <div class="db-info">
                                    <h3>53</h3>
                                    <h6>Ngành học</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>Copyright © 2020 Dreamguys.</p>
    </footer>
    </div>
@endsection
