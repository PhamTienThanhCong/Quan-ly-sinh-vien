<?php

namespace App\Http\Controllers;

use App\Models\GiangVien;
use App\Models\Khoa;
use Illuminate\Http\Request;

// mien
class GiangVienController extends Controller
{

    public function index()
    {
        // get all giangviens
        $giangviens = GiangVien::all();
        $page = "Quản lý giảng viên";
        return view('admin.giangvien.index', compact('giangviens', 'page'));
    }

    public function create()
    {
        $page = "Thêm mới giảng viên";
        $khoas = Khoa::all();
        return view('admin.giangvien.create', compact('page', 'khoas'));
    }

    public function store(Request $request)
    {

        // validate
        $request->validate([
            'ma_giang_vien' => 'required|unique:giang_viens',
            'ho_ten' => 'required',
            'so_dien_thoai' => 'required',
            'ma_khoa' => 'required', 
        ]);

        $giangvien = new GiangVien();
        $giangvien->ma_giang_vien = $request->ma_giang_vien;
        $giangvien->ho_ten = $request->ho_ten;
        $giangvien->gioi_tinh = $request->gioi_tinh;
        $giangvien->sinh_nhat = $request->sinh_nhat;
        $giangvien->email = $request->email . "@dremschool.edu.com";
        $giangvien->so_dien_thoai = $request->so_dien_thoai;
        $giangvien->dia_chi = $request->dia_chi;
        $giangvien->ma_khoa = $request->ma_khoa;
        $giangvien->hoc_van = $request->hoc_van;
        $giangvien->chuyen_mon = $request->chuyen_mon;
        $giangvien->ghi_chu = $request->ghi_chu;

        // check upload file name avatar
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            if($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg'){
                return redirect()->back()->with('error', 'File ảnh không đúng định dạng');
            }
            $avatar = $giangvien->ma_giang_vien .".". $extension;
            
            // file move to public/assets/img/profiles
            $file->move('assets/img/profiles/AvatarGiangVien', $avatar);

            // remove old avatar
            if ($giangvien->avatar != "avatar.jpg") {
                unlink('assets/img/profiles/AvatarGiangVien/' . $giangvien->avatar);
            }

            $giangvien->avatar = $avatar;
        } else {
            $giangvien->avatar = "avatar.jpg";
        }

        $giangvien->save();

        // giangvien create fail
        if (!$giangvien) {
            return redirect()->back()->with('message', 'Thêm mới giảng viên thất bại')->with('status', 'danger');
        }
        return redirect()->route('admin.giang_vien.index')->with('message', 'Thêm mới giảng viên thành công')->with('status', 'success');
    }

    public function show($id)
    {
        // get giangvien by id
        $giangvien = GiangVien::find($id);
        $page = "Thông tin giảng viên";
        return view('admin.giangvien.show', compact('giangvien', 'page'));
    }

    public function edit($id)
    {
        $page = "Cập nhật giảng viên";
        $giangvien = GiangVien::find($id);
        $khoas = Khoa::all();
        return view('admin.giangvien.edit', compact('page', 'giangvien', 'khoas'));
    }

    public function update(Request $request, $id)
    {

        $giangvien = GiangVien::find($id);
        $giangvien->ho_ten = $request->ho_ten;
        $giangvien->gioi_tinh = $request->gioi_tinh;
        $giangvien->sinh_nhat = $request->sinh_nhat;
        $giangvien->so_dien_thoai = $request->so_dien_thoai;
        $giangvien->dia_chi = $request->dia_chi;
        $giangvien->ma_khoa = $request->ma_khoa;
        $giangvien->hoc_van = $request->hoc_van;
        $giangvien->chuyen_mon = $request->chuyen_mon;
        $giangvien->ghi_chu = $request->ghi_chu;

        // check upload file name avatar
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $avatar = $giangvien->ma_giang_vien ."". $name;
            
            // file move to public/assets/img/profiles
            $file->move('assets/img/profiles/AvatarGiangVien', $avatar);

            $giangvien->avatar = $avatar;
        }
        $giangvien->save();

        // giangvien create fail
        if (!$giangvien) {
            return redirect()->back()->with('message', 'Cập nhật giảng viên thất bại')->with('status', 'danger');
        }
        return redirect()->route('admin.giang_vien.show', $id)->with('message', 'Cập nhật giảng viên thành công')->with('status', 'success');
    }

    public function destroy($id)
    {
        $giangvien = GiangVien::find($id);
        $giangvien->delete();

        // giangvien delete fail
        if (!$giangvien) {
            return redirect()->back()->with('message', 'Xóa giảng viên thất bại')->with('status', 'danger');
        }
        return redirect()->route('admin.giang_vien.index')->with('message', 'Xóa giảng viên thành công')->with('status', 'success');
    }
}
