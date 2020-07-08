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
        $sale_list = Auth::user()->saleLists()->orderBy('created_at', 'asc')->get();

        return view('saleList.index', [
            'sale_list' => $sale_list,
        ]);
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
     * @param SaleList $salelist
     *
     * @return \Illuminate\Http\Response
     */
    public function show(SaleList $salelist)
    {
        return view('salelist.show');
    }

    public function getCompanies(SaleList $salelist)
    {
        return $this->getSaleListCompanies($salelist);
        // return Company::with(['listingStock', 'companyLargeCategory', 'companyMiddleCategory'])->paginate(15);
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

    private function getSaleListCompanies($salelist)
    {
        $query = Company::query();

        if (isset($salelist->company_large_category_id)) {
            $query->where('company_large_category_id', (int) $salelist->company_large_category_id);
        }

        if (isset($salelist->company_middle_category_id)) {
            $query->where('company_middle_category_id', (int) $salelist->company_middle_category_id);
        }

        if (isset($salelist->freeword)) {
            $query->where('name', 'like', "%{$salelist->freeword}%");
        }

        if (isset($salelist->address)) {
            $query->where('address', 'like', "%{$salelist->address}%");
        }

        if (isset($salelist->listing_stock_id)) {
            $query->where('listing_stock_id', $salelist->listing_stock_id);
        }

        return $query->with(['listingStock', 'companyLargeCategory', 'companyMiddleCategory'])->paginate(15);
    }
}
