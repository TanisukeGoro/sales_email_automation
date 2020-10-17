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
      Company::getCompanies() :
      Company::getSearchCompanies($request);
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
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company, Request $request)
    {
        $address = $request->old('address');
        $company_large_category_id = $request->old('company_large_category_id');
        $company_middle_category_id = $request->old('company_middle_category_id');
        $listing_stock_id = $request->old('listing_stock_id');
        $freeword = $request->old('freeword');

        // return $company_middle_category_id;

        $companies = Company::getDetailCompanies($company_large_category_id, $company_middle_category_id, $freeword, $address, $listing_stock_id)->get();

        return view('companies.show', [
            'company_count' => $companies->count(),
            'companies' => $companies,
        ]);
    }

    public function redirectToShow(Request $request)
    {
        //変数の定義
        $params = [
            'address' => $request->address,
            'company_large_category_id' => $request->company_large_category_id,
            'company_middle_category_id' => $request->company_middle_category_id,
            'freeword' => $request->freeword,
            'listing_stock_id' => $request->listing_stock_id,
        ];

        return redirect()->route('companies.show', $request->id)->withInput($params);
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
}
