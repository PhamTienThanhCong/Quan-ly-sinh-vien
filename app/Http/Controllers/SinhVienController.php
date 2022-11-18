<?php

namespace App\Http\Controllers;

use App\Models\KhoaHoc;
use App\Models\SinhVien;
use Illuminate\Http\Request;

class SinhVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        // page
        $page = "Danh sách sinh viên khóa mới";
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
            $check_tao_sinh_vien = false;
        }

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