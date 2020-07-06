<?php

namespace App\Http\Controllers;

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
        return view('companies.index');
    }

    public function searchCompany(Request $request)
    {
        return $request->all() === [] ?
      Company::with(['listingStock', 'companyLargeCategory', 'companyMiddleCategory'])->paginate(15) : $this->getSearchCompanies($request);
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
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param App\Models\Company $company
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show', [
            'company' => $company->load(['listingStock', 'companyLargeCategory', 'companyMiddleCategory']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

        if ($request->input('company_large_category_id')) {
            $query->where('company_large_category_id', (int) $request->input('company_large_category_id'));
        }

        if ($request->input('company_middle_category_id')) {
            $query->where('company_middle_category_id', (int) $request->input('company_middle_category_id'));
        }

        if (isset($request->freeword)) {
            $query->where('name', 'like', "%{$request->freeword}%");
        }

        if (isset($request->address)) {
            $query->where('address', 'like', "%{$request->address}%");
        }

        if (isset($request->listing_stock_id)) {
            $query->where('listing_stock_id', $request->listing_stock_id);
        }

        return $query->with(['listingStock', 'companyLargeCategory', 'companyMiddleCategory'])->paginate(15);
    }
}
