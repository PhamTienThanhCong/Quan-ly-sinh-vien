<?php

namespace App\Http\Controllers;

use App\Models\ChuyenNganh;
use App\Models\Khoa;
use App\Models\KhoaHoc;
use App\Models\Lop;
use App\Models\SinhVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SinhVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        // get khoa_hocs limit 1 ordering 
        $khoa_hoc = KhoaHoc::select('*')->orderBy('nam_bat_dau', 'desc')->first();
        // get current year
        $current_year = date('Y');
        // get current month
        $current_month = date('m');
        $check_tao_khoa_hoc = false;
        if ($current_year != $khoa_hoc->nam_bat_dau) {
            if ($current_month > 6 && $current_month <= 10) {
                $check_tao_khoa_hoc = true;
            }
        }

        if ($current_month > 7 && $current_month <= 10){
            $check_tao_sinh_vien = true;
        }else{
            $check_tao_sinh_vien = true;
        }

        // page
        $page = "Danh sách sinh viên khóa mới ($khoa_hoc->ma_khoa_hoc)";
    
        // get sinh_viens by sv_khoa = khoa_hoc->ma_khoa_hoc
        $sinh_viens = SinhVien::select("*")->where('sv_khoa', $khoa_hoc->ma_khoa_hoc)->get();
        // count sinh vien have ma_lop = null and sv_khoa = khoa_hoc->ma_khoa_hoc
        $count_sinh_vien = SinhVien::select("*")->where('sv_khoa', $khoa_hoc->ma_khoa_hoc)->where('ma_lop', null)->count();
        return view('admin.sinhvien.index', compact(
            'page', 
            'khoa_hoc',
            'sinh_viens', 
            'count_sinh_vien', 
            'check_tao_sinh_vien', 
            'check_tao_khoa_hoc'
        ));

    }

    public function index(Request $request){
        // get sinh vien 
        $sinh_viens = SinhVien::select("*")->where('status', 1); 
        $sv_khoas = KhoaHoc::select("*")->get();
        $khoas = Khoa::select('*')->get();
        $chuyen_nganhs = [];
        $lops = [];
        $page = "Danh sách sinh viên";
        
        $khoa = "";
        $nganh = "";
        $lop = "";
        $sv_khoa = "";

        if ($request->has('sv_khoa') && $request->sv_khoa != "") {
            $sv_khoa = $request->sv_khoa;
            $sinh_viens = $sinh_viens->where('sv_khoa', $sv_khoa);
        }

        if ($request->has('khoa') && $request->khoa != "") {
            $khoa = $request->khoa;
            $sinh_viens = $sinh_viens->where('ma_khoa', $khoa);
            $chuyen_nganhs = ChuyenNganh::select('*')->where('ma_khoa', $khoa)->get();
        }
        if ($request->has('nganh') && $request->nganh != "") {
            $nganh = $request->nganh;
            $sinh_viens = $sinh_viens->where('ma_chuyen_nganh', $nganh);
            $lops = SinhVien::select('ma_lop')->where('ma_chuyen_nganh', $nganh)->where('status', 1)->groupBy('ma_lop')->get();
        }
        if ($request->has('lop') && $request->lop != "") {
            $lop = $request->lop;
            $sinh_viens = $sinh_viens->where('ma_lop', $lop);
        }
        $count_sv = $sinh_viens->count();
        $sinh_viens = $sinh_viens->limit(1000)->get();
        return view('admin.sinhvien.all_sv', compact(
            'page', 
            'sinh_viens', 
            'count_sv',
            'khoas', 
            'chuyen_nganhs', 
            'lops', 
            'khoa', 
            'nganh', 
            'sv_khoas',
            'sv_khoa',
            'lop'
        ));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // create sinh vien
        $page = "Thêm sinh viên";
        $khoa_hoc = KhoaHoc::select('*')->orderBy('nam_bat_dau', 'desc')->first();
        // khoa and chuyen_nganh
        $chuyen_nganhs = ChuyenNganh::select('*')->get();

        return view('admin.sinhvien.create', compact('page', 'khoa_hoc', 'chuyen_nganhs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get last sinh vien
        $last_sinh_vien = SinhVien::select('*')->orderBy('ma_sinh_vien', 'desc')->first();
        // string to int 
        $last_sinh_vien->ma_sinh_vien = (int) $last_sinh_vien->ma_sinh_vien + 1;
        // $last_sinh_vien++;
        // get current khoa hoc
        $khoa_hoc = KhoaHoc::select('*')->orderBy('nam_bat_dau', 'desc')->limit(5)->get();
        // split by ,
        $arr = explode(',', $request->chuyen_nganh);
        $ma_chuyen_nganh = $arr[0];
        $ma_khoa = $arr[1];

        $sinh_vien = new SinhVien();
        $sinh_vien->ma_sinh_vien = $last_sinh_vien->ma_sinh_vien;
        $sinh_vien->ho_ten = $request->ho_ten;
        $sinh_vien->ngay_sinh = $request->ngay_sinh;
        $sinh_vien->gioi_tinh = $request->gioi_tinh;
        $sinh_vien->email = $sinh_vien->ma_sinh_vien . "@st.phenikaa-uni.edu.vn";
        $sinh_vien->so_dien_thoai = $request->so_dien_thoai;
        $sinh_vien->dia_chi = $request->dia_chi;
        $sinh_vien->ma_chuyen_nganh = $ma_chuyen_nganh;
        $sinh_vien->ma_khoa = $ma_khoa;
        $sinh_vien->sv_khoa = $khoa_hoc->ma_khoa_hoc;
        // password
        $sinh_vien->password = bcrypt($sinh_vien->ma_sinh_vien);

        $sinh_vien->save();

        return redirect()->route('admin.sinh_vien.khoa_moi')->with('message', 'Thêm sinh viên thành công')->with('status', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get sinh vien
        $sinh_vien = SinhVien::select('sinh_viens.*', DB::raw('khoa_hocs.nam_bat_dau as nam_bat_dau'))
            ->join('khoa_hocs', 'sinh_viens.sv_khoa', '=', 'khoa_hocs.ma_khoa_hoc')
            ->where('sinh_viens.ma_sinh_vien', $id)
            ->first();
        $get_chuyen_nganh = ChuyenNganh::select('chuyen_nganhs.*', DB::raw('khoas.ten_khoa'))
            ->join('khoas', 'chuyen_nganhs.ma_khoa', '=', 'khoas.ma_khoa')
            ->where('chuyen_nganhs.ma_chuyen_nganh', $sinh_vien->ma_chuyen_nganh)
            ->first();

        $page = "Thông tin sinh viên " . $sinh_vien->ho_ten;

        return view('admin.sinhvien.show', compact(
            'page', 
            'sinh_vien',
            'get_chuyen_nganh'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
