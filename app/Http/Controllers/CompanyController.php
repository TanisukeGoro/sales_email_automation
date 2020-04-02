<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyCategory;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    private $search_count;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->search_count = Company::all()->count();
        $company_categories = CompanyCategory::all();

        $companies = $request->all() === [] ? Company::paginate(20) : $this->getSearchCompanies($request);

        return view('companies.index', [
            'search_count' => $this->search_count,
            'companies' => $companies,
            'company_categories' => $company_categories,
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
        $url = $company->form_url ?? '';

        if ($url !== '') {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', $url);
            // レスポンスボディを取得
            $responseBody = $response->getBody()->getContents();
            $responseBody = \str_replace('src="//', 'srchttps', $responseBody);
            $responseBody = \str_replace('src="/', "src=\"{$company->top_page}", $responseBody);
            $responseBody = \str_replace('srchttps', 'src="https://', $responseBody);
            $responseBody = \str_replace('href="/', "src=\"{$company->top_page}", $responseBody);
        }

        // return response()->json($responseBody);
        return view('companies.show', [
            'company' => $company,
            'form_dom' => $responseBody,
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

        if (isset($request->category)) {
            $query->where('company_category_id', (int) $request->category);
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
