@extends('layouts.admin')

@section('style')
    {{-- css --}}
@endsection

@section('script')
    {{-- style --}}
@endsection

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
       <div class="page-header">
          <div class="row align-items-center">
             <div class="col">
                <h3 class="page-title">Sửa Thông tin cá nhân</h3>
                <ul class="breadcrumb">
                   <li class="breadcrumb-item"><a href="students.html">Trang cá nhân</a></li>
                   <li class="breadcrumb-item active">Sửa Thông tin cá nhân</li>
                </ul>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-sm-12">
             <div class="card">
                <div class="card-body">
                   <form>
                      <div class="row">
                         <div class="col-12">
                            <h5 class="form-title"><span>Thông tin sinh viên</span></h5>
                         </div>
                         <div class="col-12 col-sm-6">
                            <div class="form-group">
                               <label>Họ </label>
                               <input type="text" class="form-control" value="Nathan Humphries">
                            </div>
                         </div>
                         <div class="col-12 col-sm-6">
                            <div class="form-group">
                               <label>Tên</label>
                               <input type="text" class="form-control" value="VŨ THỊ MIÊN">
                            </div>
                         </div>
                         <div class="col-12 col-sm-6">
                            <div class="form-group">
                               <label>Thẻ học sinh</label>
                               <input type="text" class="form-control" value="20010912">
                            </div>
                         </div>
                         <div class="col-12 col-sm-6">
                            <div class="form-group">
                               <label>Giới tính</label>
                               <select class="form-control">
                                  <option> Giới tính</option>
                                  <option>Nam</option>
                                  <option>Nữ</option>
                                  <option>Khác</option>
                               </select>
                            </div>
                         </div>
                         <div class="col-12 col-sm-6">
                            <div class="form-group">
                               <label>Ngày sinh</label>
                               <div>
                                  <input type="text" class="form-control" value="20 /2002">
                               </div>
                            </div>
                         </div>
                         <div class="col-12 col-sm-6">
                            <div class="form-group">
                               <label>trình độ</label>
                               <input type="text" class="form-control" value="Đại học">
                            </div>
                         </div>
                         <div class="col-12 col-sm-6">
                            <div class="form-group">
                               <label>Tôn giáo</label>
                               <input type="text" class="form-control" value="Kinh">
                            </div>
                         </div>
                         <div class="col-12 col-sm-6">
                            <div class="form-group">
                               <label>Ngày tham gia</label>
                               <div>
                                  <input type="text" class="form-control" value="4 năm 2002">
                               </div>
                            </div>
                         </div>
                         <div class="col-12 col-sm-6">
                            <div class="form-group">
                               <label>Số điện thoại</label>
                               <input type="text" class="form-control" value="0394 647 586">
                            </div>
                         </div>
                         <div class="col-12 col-sm-6">
                            <div class="form-group">
                               <label>Số lượng nhập học</label>
                               <input type="text" class="form-control" value="PRE1252">
                            </div>
                         </div>
                         <div class="col-12 col-sm-6">
                            <div class="form-group">
                               <label>Phần </label>
                               <input type="text" class="form-control" value="B">
                            </div>
                         </div>
                         <div class="col-12 col-sm-6">
                            <div class="form-group">
                               <label>Hình ảnh sinh viên</label>
                               <input type="file" class="form-control">
                            </div>
                         </div>
                         <div class="col-12">
                            <h5 class="form-title"><span>Thông tin dành cho cha mẹ</span></h5>
                         </div>
                         <div class="col-12 col-sm-6">
                            <div class="form-group">
                               <label>Tên Cha</label>
                               <input type="text" class="form-control" value="Vũ Văn A">
                            </div>
                         </div>
                         <div class="col-12 col-sm-6">
                            <div class="form-group">
                               <label>Nghề nghiệp</label>
                               <input type="text" class="form-control" value="Tự do">
                            </div>
                         </div>
                         <div class="col-12 col-sm-6">
                            <div class="form-group">
                               <label>Số điện thoại</label>
                               <input type="text" class="form-control" value="	0394 221 752">
                            </div>
                         </div>
                         <div class="col-12 col-sm-6">
                            <div class="form-group">
                               <label>Địa chỉ Email</label>
                               <input type="email" class="form-control" value="VũVan@gmail.com">
                            </div>
                         </div>
                         <div class="col-12 col-sm-6">
                            <div class="form-group">
                               <label>Tên mẹ</label>
                               <input type="text" class="form-control" value="Nguyễn thị B">
                            </div>
                         </div>
                         <div class="col-12 col-sm-6">
                            <div class="form-group">
                               <label>Nghề nghiệp</label>
                               <input type="text" class="form-control" value="Tự do">
                            </div>
                         </div>
                         <div class="col-12 col-sm-6">
                            <div class="form-group">
                               <label>Số điện thoại</label>
                               <input type="text" class="form-control" value="026 7318 4366">
                            </div>
                         </div>
                         <div class="col-12 col-sm-6">
                            <div class="form-group">
                               <label>Địa chỉ Email</label>
                               <input type="email" class="form-control" value="NguyễnA@gmail.com">
                            </div>
                         </div>
                         <div class="col-12 col-sm-6">
                            <div class="form-group">
                               <label>Nơi ở hiện tại</label>
                               <textarea class="form-control">57 chợ vò yên cường ý yên nam định</textarea>
                            </div>
                         </div>
                         <div class="col-12 col-sm-6">
                            <div class="form-group">
                               <label>ĐỊa chỉ thường trú</label>
                               <textarea class="form-control">57 chợ vò yên cường ý yên nam định</textarea>
                            </div>
                         </div>
                         <div class="col-12">
                            <button type="submit" class="btn btn-primary">Gủi đi</button>
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