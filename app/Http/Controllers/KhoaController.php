<?php

namespace App\Http\Controllers;

use App\Models\Khoa;
use App\Http\Requests\StoreKhoaRequest;
use App\Http\Requests\UpdateKhoaRequest;

class KhoaController extends Controller
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
     * @param  \App\Http\Requests\StoreKhoaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKhoaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Khoa  $khoa
     * @return \Illuminate\Http\Response
     */
    public function show(Khoa $khoa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Khoa  $khoa
     * @return \Illuminate\Http\Response
     */
    public function edit(Khoa $khoa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKhoaRequest  $request
     * @param  \App\Models\Khoa  $khoa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKhoaRequest $request, Khoa $khoa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Khoa  $khoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Khoa $khoa)
    {
        //
    }
}
