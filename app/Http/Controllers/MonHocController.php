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
    public function index()
    {
        $page = "Danh sách tất cả môn học";
        // get mon_hocs with khoa 
        $mon_hocs = MonHoc::select('mon_hocs.*', 'khoas.ten_khoa' )
            ->join('khoas', 'mon_hocs.ma_khoa', '=', 'khoas.ma_khoa')
            ->get();
        
        $mon_hoc_chuyen_nganh = MonHoc::select("*")
                ->whereNull('ma_khoa')
                ->get();
        $mon_hocs = $mon_hocs->merge($mon_hoc_chuyen_nganh);
        // page
        return view('admin.monhoc.index', compact('page', 'mon_hocs'));
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
