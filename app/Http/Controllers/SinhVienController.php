<?php

namespace App\Http\Controllers;

use App\Models\KhoaHoc;
use App\Models\SinhVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;

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

    public function index($khoa){
        // get sinh vien 
        $sinh_viens = SinhVien::select("*")->where('status', 1);
        $page = "Danh sách sinh viên khóa toàn khóa";
        if ($khoa !== 'all') {
            $page = "Danh sách sinh viên";
            $sinh_viens->where('sv_khoa', $khoa);
        }
        $sinh_viens = $sinh_viens->get();
        return view('admin.sinhvien.all_sv', compact('page', 'sinh_viens'));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function setInputEncoding($file) {
        $fileContent = file_get_contents($file->path());
        $enc = mb_detect_encoding($fileContent, mb_list_encodings(), true);
    
        Config::set('excel.imports.csv.input_encoding', $enc);
    }

    public function importCSV(Request $request)
    {
        try {
            $inputs = $request->all();
            setInputEncoding($inputs['file']);
            $file = $inputs['file'];
            dd($file);

            // return redirect()->back()->with('success', 'Upload File Thành Công');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();

            return redirect()->back()->with('failures', $failures);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
