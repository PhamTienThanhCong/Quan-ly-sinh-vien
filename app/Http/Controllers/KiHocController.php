<?php

namespace App\Http\Controllers;

use App\Models\KyHoc;
use App\Models\LopHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KiHocController extends Controller
{
    public function index(Request $request)
    {
        $kys = KyHoc::select("*")->orderBy('id', 'desc')->get();
        if ($request->has('id')){
            if ($request->has('id') != ''){
                $id_ky = $request->get('id');
            }else{
                $id_ky = $kys[0]->id;
            }
        }else{
            $id_ky = $kys[0]->id;
        }
        $ky = KyHoc::find($id_ky);
        $page = "Năm học " . $ky->nam_hoc . " - học kì " . $ky->hoc_ky;

        // danh sách khoa
        $ds_khoas = explode(',', $ky->khoas);
        // up case $ds_khoas
        $ds_khoas = array_map('strtoupper', $ds_khoas);

        // tổng số lượng sinh viên của khoa trong ds_khoas
        $tong_sv = $ky->tong_sv_theo_khoa();
        // get all kì học

        // get all lop_hoc where ma_ky_hoc = $id_ky and count dang_ki_hocs 
        $lop_hocs = LopHoc::select("lop_hocs.*", DB::raw("count(dang_ki_hocs.id) as so_luong_dang_ki"), "mon_hocs.ten_mon_hoc", "mon_hocs.so_tin_chi", "giang_viens.ho_ten")
            ->leftJoin('dang_ki_hocs', 'lop_hocs.id', '=', 'dang_ki_hocs.ma_lop_hoc')
            ->leftJoin('giang_viens', 'lop_hocs.ma_giang_vien', '=', 'giang_viens.ma_giang_vien')
            ->leftJoin('mon_hocs', 'lop_hocs.ma_mon_hoc', '=', 'mon_hocs.ma_mon_hoc')
            ->where('lop_hocs.ma_ky_hoc', $id_ky)
            ->groupBy('lop_hocs.id')
            ->get();

        // dd($lop_hocs);

        return view('admin.Ki_hoc.index', compact(
            'page', 
            'kys', 
            'id_ky', 
            'ds_khoas',
            'tong_sv',
            'lop_hocs'
        ));
    }

    public function create(){
        // get last kì học
        $last_ky = KyHoc::select("*")->orderBy('id', 'desc')->first();
        // get year
        $year = date('Y');
        $ky_moi = 2;
        if ($last_ky->nam_hoc < $year){
            $year = $year + 1;
            $ky_moi = 1;
        }elseif ($last_ky->nam_hoc == $year){
            if ($last_ky->hoc_ky == 1){
                $ky_moi = 2;
            }else{
                return redirect()->route('admin.ki_hoc.index')->with('message', 'Không thể tạo được kỳ học mới ngay lúc này')->with('status', 'error');
            }
        }
        // add ki hoc moi
        $ky = new KyHoc();
        $ky->nam_hoc = $year;
        $ky->hoc_ky = $ky_moi;
        $ky->save();
        return redirect()->route('admin.ki_hoc.index')->with('message', 'Thêm kì học thành công')->with('status', 'success');
    }
    public function add_class($id){
        // $id
        // get ky_hocs by id
        $ky = KyHoc::find($id); 
        // get all khoas in ky_hoc
        $khoas = explode(',', $ky->khoas); 

        // $khoas = DB::table('khoas')->select('khoas.ma_khoa', DB::raw("count(sinh_viens.ma_sinh_vien) as so_luong_sv"))
        //     ->leftJoin('sinh_viens', 'khoas.ma_khoa', '=', 'sinh_viens.ma_khoa')
        //     ->whereIn('sinh_viens.sv_khoa', $khoas)
        //     ->groupBy('khoas.ma_khoa')
        //     ->get();
        // // count sinh vien theo khoa
        // // get mon_hocs has ki_hoc mod 2 = 0
        // $mon_hocs = DB::table('mon_hocs')->select('mon_hocs.*')
        //     ->orderBy('ki_hoc', 'asc')
        //     ->get();

        for ($i=0; $i < count($khoas); $i++) { 
            $ds_khoa_sv = DB::table('khoas')->select('khoas.ma_khoa', DB::raw("count(sinh_viens.ma_sinh_vien) as so_luong_sv"))
                ->leftJoin('sinh_viens', 'khoas.ma_khoa', '=', 'sinh_viens.ma_khoa')
                ->where('sinh_viens.sv_khoa', $khoas[$i])
                ->groupBy('khoas.ma_khoa')
                ->get();
            // dd($ky);
            if ($ky->hoc_ky == 1){
                $ky_hoc_get = [1,3,5,7,9];
            }else{
                $ky_hoc_get = [2,4,6,8,10];
            }
            for ($j=0; $j < count($ds_khoa_sv); $j++) { 
                // get mon_hocs has ma_khoa = $ds_khoa_sv[$j]->ma_khoa

                $mon_hocs = DB::table('mon_hocs')->select('mon_hocs.*')
                    ->where('mon_hocs.ma_khoa', $ds_khoa_sv[$j]->ma_khoa)
                    // where in $ky_hoc_get
                    ->whereIn('mon_hocs.ki_hoc', $ky_hoc_get)
                    ->orderBy('ki_hoc', 'asc')
                    ->get();
                
                // get giang_viens has ma_khoa = $ds_khoa_sv[$j]->ma_khoa

                $giang_viens = DB::table('giang_viens')->select('giang_viens.ma_giang_vien')
                    ->where('giang_viens.ma_khoa', $ds_khoa_sv[$j]->ma_khoa)
                    ->get();

                if (count($mon_hocs) > 0 && count($giang_viens) > 0){
                    // add lop_hoc
                    for ($k=0; $k < count($mon_hocs); $k++) { 
                        $lop_hoc = new LopHoc();
                        $lop_hoc->ma_ky_hoc = $ky->id;
                        $lop_hoc->ma_mon_hoc = $mon_hocs[$k]->ma_mon_hoc;
                        $lop_hoc->ma_giang_vien = $giang_viens[rand(0, count($giang_viens)-1)]->ma_giang_vien;
                        // get current year
                        $year_1 = date('Y');
                        if ($ky->hoc_ky == 2){
                            $year_2 = $year_1 + 1;
                            $ngay_bat_dau = $year_1.'-12-20';
                            $ngay_ket_thuc = $year_2.'-4-10';
                        }else{
                            $year_2 = $year_1;
                            $ngay_bat_dau = $year_1.'-09-10';
                            $ngay_ket_thuc = $year_2.'-12-10';
                        }
                        $lop_hoc->ngay_bat_dau = $ngay_bat_dau;
                        $lop_hoc->ngay_ket_thuc = $ngay_ket_thuc;

                        $lop_hoc->ngay_trong_tuan = rand(2, 7);
                        $lop_hoc->tiet_bat_dau = rand(1, 10);
                        $lop_hoc->so_tiet = rand(1, 3);
                    
                        $lop_hoc->phong_hoc = 'A'.rand(1, 10);

                        $lop_hoc->save();
                    }
                }
            }

        }
        return redirect()->back()->with('message', 'Thêm lớp học thành công')->with('status', 'success');
    }

    public function view_class($id){
        // get lop hoc
        $page = "Xem lớp học mã số: " . $id;
        $lop_hocs = DB::table('lop_hocs')->select('lop_hocs.*', 'mon_hocs.ten_mon_hoc', 'giang_viens.ho_ten', 'giang_viens.avatar', "giang_viens.ma_khoa", "giang_viens.email")
            ->leftJoin('mon_hocs', 'lop_hocs.ma_mon_hoc', '=', 'mon_hocs.ma_mon_hoc')
            ->leftJoin('giang_viens', 'lop_hocs.ma_giang_vien', '=', 'giang_viens.ma_giang_vien')
            ->where('lop_hocs.id', $id)
            ->get();
        $lop_hocs = $lop_hocs[0];
        // dd($lop_hocs);
        // get sinh vien
        $sinh_vien_dks = DB::table('dang_ki_hocs')->select("dang_ki_hocs.*","sinh_viens.*")
            ->leftJoin('sinh_viens', 'dang_ki_hocs.ma_sinh_vien', '=', 'sinh_viens.ma_sinh_vien')
            ->where('dang_ki_hocs.ma_lop_hoc', $id)
            ->get();
        return view('admin.Ki_hoc.view_class', compact('page', 'lop_hocs', 'sinh_vien_dks'));
    }

    public function chat(){
        $page = "Chat";
        // get 10 sinh vien
        $sinh_viens = DB::table('sinh_viens')->select('sinh_viens.*')
            ->limit(10)
            ->get();
        return view('admin.chat', compact('page', 'sinh_viens'));
    }

}
