<?php

namespace App\Http\Controllers;

use App\Models\Diem;
use App\Http\Requests\StoreDiemRequest;
use App\Http\Requests\UpdateDiemRequest;

class DiemController extends Controller
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
     * @param  \App\Http\Requests\StoreDiemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diem  $diem
     * @return \Illuminate\Http\Response
     */
    public function show(Diem $diem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diem  $diem
     * @return \Illuminate\Http\Response
     */
    public function edit(Diem $diem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiemRequest  $request
     * @param  \App\Models\Diem  $diem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiemRequest $request, Diem $diem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diem  $diem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diem $diem)
    {
        //
    }
}
