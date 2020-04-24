<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    private $search_count;

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

        $companies = $request->all() === [] ? Company::paginate(20) : $this->getSearchCompanies($request);

        $request->flashOnly(['name', 'address', 'large-category', 'middle-category']);

        return view('companies.index', [
            'search_count' => $this->search_count,
            'companies' => $companies,
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

        if ($request->input('large-category')) {
            $query->where('company_large_category_id', (int) $request->input('large-category'));
        }

        if ($request->input('large-category')) {
            $query->where('company_large_category_id', (int) $request->input('large-category'));
        }

        if (isset($request->name)) {
            $query->where('name', 'like', "%{$request->name}%");
        }

        if (isset($request->address)) {
            $query->where('address', 'like', "%{$request->address}%");
        }

        if (isset($request->sort)) {
            $sortItem = $request->sort;

            if ($sortItem === 'listing_stock') {
                $query->orderBy('listing_stock_id', 'asc');
            } elseif ($sortItem === 'n_employees') {
                $query->orderBy('n_employees', 'asc');
            } elseif ($sortItem === 'category') {
                $query->orderBy('campany_category_id', 'desc');
            }
        }

        $this->search_count = $query->get()->count();

        return $query->paginate(20);
    }
}
