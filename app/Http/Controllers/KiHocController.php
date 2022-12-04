<?php

namespace App\Http\Controllers;

use App\Models\KyHoc;
use Illuminate\Http\Request;

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
        return view('admin.Ki_hoc.index', compact(
            'page', 
            'kys', 
            'id_ky', 
            'ds_khoas',
            'tong_sv'
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
}
