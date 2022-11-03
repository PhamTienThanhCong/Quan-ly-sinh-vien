<?php

namespace App\Http\Controllers;

use App\Models\MonHoc;
use App\Http\Requests\StoreMonHocRequest;
use App\Http\Requests\UpdateMonHocRequest;

class MonHocController extends Controller
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
     * @param  \App\Http\Requests\StoreMonHocRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMonHocRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MonHoc  $monHoc
     * @return \Illuminate\Http\Response
     */
    public function show(MonHoc $monHoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MonHoc  $monHoc
     * @return \Illuminate\Http\Response
     */
    public function edit(MonHoc $monHoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMonHocRequest  $request
     * @param  \App\Models\MonHoc  $monHoc
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMonHocRequest $request, MonHoc $monHoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MonHoc  $monHoc
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonHoc $monHoc)
    {
        //
    }
}
