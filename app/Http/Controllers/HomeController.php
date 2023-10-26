<?php

namespace App\Http\Controllers;

use App\Models\DangKiHoc;
use App\Models\KyHoc;
use App\Models\LopHoc;
use App\Models\MonHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// mô hình mvc 
// m : modal , v : view , controller : các file xử lý 
class HomeController extends Controller
{
    // view subject
    // miên
    public function viewSubject()
    {
        $page = "Danh sách chương trình học";
        $khoa = Auth::guard('student')->user()->ma_khoa;

        $mon_hocs = MonHoc::where('ma_khoa', $khoa)->orWhere('ma_khoa', null)
                    ->orderBy('ki_hoc', 'asc')
                    ->get();
        return view('student.subject.viewSubject', compact('page', 'mon_hocs'));
    }

    public function chat(){
        $page = "Chat";
        return view('student.chat', compact('page'));
    }
    
    // cong
    public function subjectRegister(Request $request){
        $page = "Đăng kí môn học";

        $ky = KyHoc::select("*")->orderBy('id', 'desc')->get();
        $id_ky = $ky[0]->id;

        $year1 = $ky[0]->nam_hoc;
        // get current year and month
        $year2 = date("Y");
        $month = date("m");
        $check = false;

        if ($month == 10 && $year1 == $year2 && $ky[0]->hoc_ky == 1) {
            $check = true;
        }else if ($month == 12 && $year1 == $year2 && $ky[0]->hoc_ky == 2) {
            $check = true;
        }

        if ($check){
            $user = Auth::guard('student')->user();

            // get all lop_hoc where ma_ky_hoc = $id_ky and count dang_ki_hocs 
            $lop_hocs = LopHoc::select("lop_hocs.*", DB::raw("count(dang_ki_hocs.id) as so_luong_dang_ki"), "mon_hocs.ten_mon_hoc", "mon_hocs.so_tin_chi", "giang_viens.ho_ten")
                ->leftJoin('dang_ki_hocs', 'lop_hocs.id', '=', 'dang_ki_hocs.ma_lop_hoc')
                ->leftJoin('giang_viens', 'lop_hocs.ma_giang_vien', '=', 'giang_viens.ma_giang_vien')
                ->leftJoin('mon_hocs', 'lop_hocs.ma_mon_hoc', '=', 'mon_hocs.ma_mon_hoc')
                ->where('lop_hocs.ma_ky_hoc', $id_ky)
                ->where('mon_hocs.ma_khoa', $user->ma_khoa)
                ->groupBy('lop_hocs.id')
                ->get();

            for ($i = 0; $i < count($lop_hocs); $i++) {
                $count = DangKiHoc::where('ma_lop_hoc', $lop_hocs[$i]->id)
                    ->where('ma_sinh_vien', $user->ma_sinh_vien)
                    ->where('ma_lop_hoc', $lop_hocs[$i]->id)
                    ->count();
                if ($count > 0) {
                    $lop_hocs[$i]->dang_ki = true;
                } else {
                    $lop_hocs[$i]->dang_ki = false;
                }
            }
        }else{
            $lop_hocs = [];
        }
        return view('student.subject.subjectRegister', compact(
            'page', 
            'id_ky', 
            'lop_hocs'
        ));
    }

    public function subjectRegisterProcess($id){
        $user = Auth::guard('student')->user();
        $lop_hoc = LopHoc::find($id);
        $dang_ki_hoc = new DangKiHoc();
        $dang_ki_hoc->ma_lop_hoc = $lop_hoc->id;
        $dang_ki_hoc->ma_sinh_vien = $user->ma_sinh_vien;
        $dang_ki_hoc->save();
        return redirect()->back();
    }

    public function subjectRegisterCancel($id){
        $user = Auth::guard('student')->user();
        $lop_hoc = LopHoc::find($id);
        $dang_ki_hoc = DangKiHoc::where('ma_lop_hoc', $lop_hoc->id)
            ->where('ma_sinh_vien', $user->ma_sinh_vien)
            ->first();
        $dang_ki_hoc->delete();
        return redirect()->back();
    }
}
