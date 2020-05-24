<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\SearchConditions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search_conditions = Auth::user()->search_conditions()->orderBy('created_at', 'asc')->get();

        return view('businessList.index', [
            'search_conditions' => $search_conditions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('businessList.create', [
            'template' => $request,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('businessList.show');
    }

    public function getCompanies(SearchConditions $search_condition)
    {
        $companies = $this->getBusinessListCompanies($search_condition);
        return Company::with(['listingStock', 'companyLargeCategory', 'companyMiddleCategory'])->paginate(15);
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
     * @param \Illuminate\Http\Request $request
     * @param int $id
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
     * @param SearchConditions $business_list
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(SearchConditions $business_list)
    {
        // $this->authorize('delete', $search_condition);
        return $business_list;
        // $search_condition->delete();

        return redirect()->route('business-list.index');
    }

    private function getBusinessListCompanies($search_condition)
    {
        $query = Company::query();

        if ($search_condition->company_large_category_id) {
            $query->where('company_large_category_id', (int) $search_condition->company_large_category_id);
        }

        if ($search_condition->company_middle_category_id) {
            $query->where('company_middle_category_id', (int) $search_condition->company_middle_category_id);
        }

        if (isset($search_condition->freeword)) {
            $query->where('name', 'like', "%{$search_condition->freeword}%");
        }

        if (isset($search_condition->address)) {
            $query->where('address', 'like', "%{$search_condition->address}%");
        }

        // if (isset($search_condition->listing_stock)) {
        //   $query->where('listing_stock_id', $search_condition->listing_stock);
        // }

        return $query->paginate(15);
    }
}
