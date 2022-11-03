<?php

namespace App\Http\Controllers;

use App\Models\SinhVien;
use App\Http\Requests\StoreSinhVienRequest;
use App\Http\Requests\UpdateSinhVienRequest;

class SinhVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreSinhVienRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSinhVienRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SinhVien  $sinhVien
     * @return \Illuminate\Http\Response
     */
    public function show(SinhVien $sinhVien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SinhVien  $sinhVien
     * @return \Illuminate\Http\Response
     */
    public function edit(SinhVien $sinhVien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSinhVienRequest  $request
     * @param  \App\Models\SinhVien  $sinhVien
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSinhVienRequest $request, SinhVien $sinhVien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SinhVien  $sinhVien
     * @return \Illuminate\Http\Response
     */
    public function destroy(SinhVien $sinhVien)
    {
        //
    }
}
