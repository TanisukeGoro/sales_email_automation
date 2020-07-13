<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleListRequest;
use App\Models\Company;
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
        $sale_list = Auth::user()->saleLists()->orderBy('id', 'desc')->get();

        return view('saleList.index', [
            'sale_list' => $sale_list,
        ]);
    }

    public function searchSaleList(Request $request)
    {
        return $request->all() === [] ?
      SaleList::getSaleList() :
      SaleList::getSearchSaleList($request);
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
        $sale_list = $salelist->load(['listingStock', 'companyLargeCategory', 'companyMiddleCategory']);

        return view('salelist.show', [
            'sale_list' => $sale_list,
        ]);
    }

    public function getCompanies(SaleList $salelist)
    {
        return Company::getSearchCompanies($salelist);
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
    public function update(Request $request, SaleList $salelist)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\SaleList $saleList
     * @param SaleList $salelist
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleList $salelist)
    {
        $this->authorize('delete', $salelist);
        $salelist->delete();

        return redirect()->route('salelist.index');
    }
}
