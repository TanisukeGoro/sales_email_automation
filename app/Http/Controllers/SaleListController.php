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
    //一覧を返す
    public function index()
    {
        $sale_list = Auth::user()->saleLists()->orderBy('id', 'desc')->get();

        return view('saleList.index', [
            'sale_list' => $sale_list,
        ]);
    }

    //一覧画面で並び替えをした時に発動されるAPI
    public function sortSaleList(Request $request)
    {
        return $request->all() === [] ?
      SaleList::getSaleList() :
      SaleList::getSortSaleList($request);
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

    //新規登録
    public function store(SaleListRequest $request): void
    {
        $sale_list = new SaleList();
        $sale_list->createSaleList($request);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\SaleList $saleList
     * @param SaleList $salelist
     *
     * @return \Illuminate\Http\Response
     */
    public function show(SaleList $salelist)
    {
        return view('salelist.show');
    }

    public function getSaleList(SaleList $salelist)
    {
        return $salelist->load(['listingStock', 'companyLargeCategory', 'companyMiddleCategory']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\SaleList $saleList
     * @param SaleList $salelist
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleList $salelist)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\SaleList $saleList
     * @param SaleList $salelist
     *
     * @return \Illuminate\Http\Response
     */
    public function update(SaleListRequest $request, SaleList $salelist)
    {
        $this->authorize('update', $salelist);
        $salelist->fill($request->all())->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\SaleList $saleList
     * @param SaleList $salelist
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleList $salelist)
    {
        $this->authorize('delete', $salelist);
        $salelist->delete();
    }
}
