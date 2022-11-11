<?php

namespace App\Http\Controllers;

use App\Http\Requests\createNganhRequest;
use App\Models\ChuyenNganh;
use App\Models\Khoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChuyenNganhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  get chuyennganh with khoa
        $page = 'Quản Lý Chuyên Ngành';
        $chuyenNganhs = ChuyenNganh::select('chuyen_nganhs.*', 'khoas.ten_khoa', DB::raw('COUNT(sinh_viens.ma_chuyen_nganh) sinh_vien'))
            ->leftJoin('sinh_viens', 'sinh_viens.ma_chuyen_nganh', '=', 'chuyen_nganhs.ma_chuyen_nganh')
            ->join('khoas', 'chuyen_nganhs.ma_khoa', '=', 'khoas.ma_khoa')
            ->groupBy('chuyen_nganhs.ma_chuyen_nganh')
            ->get();

        return view('admin.chuyen_nganh.index', compact('chuyenNganhs', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = 'Thêm Chuyên Ngành';
        $khoas = Khoa::all();
        return view('admin.chuyen_nganh.create', compact('page', 'khoas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createNganhRequest $request)
    {
        $chuyenNganh = new ChuyenNganh();
        // upcase
        $chuyenNganh->ma_chuyen_nganh = strtoupper($request->ma_nganh);
        $chuyenNganh->ten_chuyen_nganh = $request->ten_nganh;
        $chuyenNganh->ma_khoa = $request->ma_khoa;
        $chuyenNganh->save();
        return redirect()->route('admin.chuyen_nganh')->with('message', 'Thêm chuyên ngành mới thành công')->with('status', 'success');
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
        $page = 'Sửa Chuyên Ngành';
        $chuyenNganh = ChuyenNganh::find($id);
        $khoas = Khoa::all();
        return view('admin.chuyen_nganh.edit', compact('page', 'chuyenNganh', 'khoas'));
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
        $chuyenNganh = ChuyenNganh::where('ma_chuyen_nganh', $id)->first();
        $chuyenNganh->ten_chuyen_nganh = $request->ten_chuyen_nganh;
        $chuyenNganh->ma_khoa = $request->ma_khoa;
        $chuyenNganh->save();
        return redirect()->route('admin.chuyen_nganh')->with('message', 'Sửa chuyên ngành thành công')->with('status', 'success');
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
