<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->search_count = Company::all()->count();

        return $request->all() === [] ?
      Company::with(['listingStock', 'companyLargeCategory', 'companyMiddleCategory'])->paginate(15) : $this->getSearchCompanies($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    private function getSearchCompanies($request)
    {
        $query = Company::query();

        if ($request->input('large_category')) {
            $query->where('company_large_category_id', (int) $request->input('large_category'));
        }

        if ($request->input('middle_category')) {
            $query->where('company_middle_category_id', (int) $request->input('middle_category'));
        }

        if (isset($request->name)) {
            $query->where('name', 'like', "%{$request->name}%");
        }

        if (isset($request->address)) {
            $query->where('address', 'like', "%{$request->address}%");
        }

        if (isset($request->listing_stock)) {
            $query->where('listing_stock_id', $request->listing_stock);
        }

        return $query->with(['listingStock', 'companyLargeCategory', 'companyMiddleCategory'])->paginate(15);
    }
}
