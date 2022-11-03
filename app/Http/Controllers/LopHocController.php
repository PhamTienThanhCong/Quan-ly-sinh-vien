<?php

namespace App\Http\Controllers;

use App\Models\LopHoc;
use App\Http\Requests\StoreLopHocRequest;
use App\Http\Requests\UpdateLopHocRequest;

class LopHocController extends Controller
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
     * @param  \App\Http\Requests\StoreLopHocRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLopHocRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LopHoc  $lopHoc
     * @return \Illuminate\Http\Response
     */
    public function show(LopHoc $lopHoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LopHoc  $lopHoc
     * @return \Illuminate\Http\Response
     */
    public function edit(LopHoc $lopHoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLopHocRequest  $request
     * @param  \App\Models\LopHoc  $lopHoc
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLopHocRequest $request, LopHoc $lopHoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LopHoc  $lopHoc
     * @return \Illuminate\Http\Response
     */
    public function destroy(LopHoc $lopHoc)
    {
        //
    }
}
