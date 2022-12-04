<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMonHocRequest;
use App\Models\ChuyenNganh;
use App\Models\Khoa;
use App\Models\MonHoc;
use Illuminate\Http\Request;

class MonHocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = "Danh sách tất cả môn học";
        // get mon_hocs with khoa 
        $mon_hocs = MonHoc::select('mon_hocs.*', 'khoas.ten_khoa' )
            ->join('khoas', 'mon_hocs.ma_khoa', '=', 'khoas.ma_khoa');
        
        $search_khoa = "";
        if ($request->has('khoa')){
            if ($request->khoa != ''){
                $search_khoa = $request->khoa;
                if ($search_khoa == 'chung'){
                    $page = "Danh sách môn học đại cương ";
                    $mon_hocs = MonHoc::select("*")
                        ->whereNull('ma_khoa')
                        ->get();
                }else{
                    $mon_hocs = $mon_hocs->where('khoas.ma_khoa', $request->khoa)->get();
                    $page = "Danh sách môn học của khoa " . Khoa::find($request->khoa)->ten_khoa;
                }
            }else{
                $mon_hocs = $mon_hocs->get();
            }
        }else{
            $mon_hocs = $mon_hocs->get();
            $mon_hoc_chuyen_nganh = MonHoc::select("*")
                    ->whereNull('ma_khoa')
                    ->get();
            $mon_hocs = $mon_hocs->merge($mon_hoc_chuyen_nganh);
        }
        // get khoas
        $khoas = Khoa::all();
        // page
        return view('admin.monhoc.index', compact('page', 'mon_hocs', 'khoas', 'search_khoa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = "Thêm môn học";
        // get all khoa
        $khoas = Khoa::select('*')->get();
        return view('admin.monhoc.create', compact('page', 'khoas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMonHocRequest $request)
    {
        $mon_hoc = new MonHoc();
        $mon_hoc->ma_mon_hoc = $request->ma_mon_hoc;
        $mon_hoc->ten_mon_hoc = $request->ten_mon_hoc;
        $mon_hoc->so_tin_chi = $request->so_tin_chi;
        $mon_hoc->ki_hoc = $request->ki_hoc;
        if($request->ma_khoa != "1"){
            $mon_hoc->ma_khoa = $request->ma_khoa;
        }
        $mon_hoc->save();

        return redirect()->route('admin.mon_hoc.index')->with('message', 'Thêm môn học thành công')->with('status', 'success');
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
        $page = "Sửa môn học";
        // get mon_hoc
        $mon_hoc = MonHoc::find($id);
        // get all khoa
        $khoas = Khoa::select('*')->get();
        return view('admin.monhoc.edit', compact('page', 'mon_hoc', 'khoas'));
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
        $mon_hoc = MonHoc::find($id);
        $mon_hoc->ten_mon_hoc = $request->ten_mon_hoc;
        $mon_hoc->so_tin_chi = $request->so_tin_chi;
        $mon_hoc->ki_hoc = $request->ki_hoc;
        if($request->ma_khoa != "1"){
            $mon_hoc->ma_khoa = $request->ma_khoa;
        }else{
            $mon_hoc->ma_khoa = null;
        }
        $mon_hoc->save();

        return redirect()->route('admin.mon_hoc.index')->with('message', "Sửa môn học " . $id . " thành công")->with('status', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mon_hoc = MonHoc::find($id);
        $mon_hoc->delete();
        return redirect()->route('admin.mon_hoc.index')->with('message', "Xóa môn học " . $id . " thành công")->with('status', 'success');
    }
}
