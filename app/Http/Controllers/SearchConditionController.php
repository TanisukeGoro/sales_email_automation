<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchConditionRequest;
use App\Models\SearchConditions;
use Illuminate\Http\Request;

class SearchConditionController extends Controller
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
    public function store(SearchConditionRequest $request)
    {
        $search_condition = new SearchConditions();
        $search_condition->user_id = auth()->user()->id;
        $search_condition->name = $request->search_condition_name;
        $search_condition->freeword = $request->freeword;
        $search_condition->company_large_category_id = $request->large_category;
        $search_condition->company_middle_category_id = $request->middle_category;
        $search_condition->address = $request->address;
        $search_condition->save();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\SearchCondition $searchCondition
     * @param SearchConditions $searchConditions
     *
     * @return \Illuminate\Http\Response
     */
    public function show(SearchConditions $searchConditions)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\SearchCondition $searchCondition
     * @param SearchConditions $searchConditions
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(SearchConditions $searchConditions)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\SearchCondition $searchCondition
     * @param SearchConditions $searchConditions
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SearchConditions $searchConditions)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\SearchCondition $searchCondition
     * @param SearchConditions $searchConditions
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(SearchConditions $searchConditions)
    {
    }
}
