<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleListRequest;
use App\Models\SaleList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SaleListRequest $request)
    {
        $saleList = new SaleList();
        $saleList->user_id = Auth::id();
        $saleList->fill($request->all())->save();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\SaleList $saleList
     *
     * @return \Illuminate\Http\Response
     */
    public function show(SaleList $saleList)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\SaleList $saleList
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleList $saleList)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\SaleList $saleList
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaleList $saleList)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\SaleList $saleList
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleList $saleList)
    {
    }
}
