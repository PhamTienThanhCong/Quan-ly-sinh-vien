<?php

namespace App\Http\Controllers;

use App\Http\Requests\createKhoaRequest;
use App\Http\Requests\editKhoaRequest;
use App\Models\Khoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KhoaControllller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $khoas = Khoa::select('khoas.ma_khoa', 'khoas.ten_khoa', DB::raw('COUNT(sinh_viens.ma_khoa) sinh_vien'))
            ->leftJoin('sinh_viens', 'sinh_viens.ma_khoa', '=', 'khoas.ma_khoa')
            ->groupBy('ma_khoa', 'ten_khoa')
            ->get();
        $page = 'Quản Lý Khoa';
        return view('admin.khoa.index', compact('khoas', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = 'Thêm Khoa';
        return view('admin.khoa.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createKhoaRequest $request)
    {
        $khoa = new Khoa();
        $khoa->ma_khoa = strtoupper($request->ma_khoa);
        $khoa->ten_khoa = $request->ten_khoa;
        $khoa->save();
        return redirect()->route('admin.danh_sach_khoa')->with('message', 'Thêm Khoa mới thành công')->with('status', 'success');
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
        // find khoa by ma_khoa
        $khoa = Khoa::select('ma_khoa', 'ten_khoa')->where('ma_khoa', $id)->first();
        $page = 'Sửa Khoa';
        return view('admin.khoa.edit', compact('khoa', 'page'));
    }

    public function update(editKhoaRequest $request, $ma_khoa)
    {
        // khoa update ten_kho by ma_khoa
        $khoa = Khoa::where('ma_khoa', $ma_khoa)->first();
        $khoa->ten_khoa = $request->ten_khoa;
        $khoa->save();
        return redirect()->route('admin.danh_sach_khoa')->with('message', 'Sửa thành công Thông tin Khoa')->with('status', 'success');;
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
