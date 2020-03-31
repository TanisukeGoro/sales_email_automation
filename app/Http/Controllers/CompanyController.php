<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = DB::table('companies');
        return view('companies.index', ['companies' => $companies->paginate(15)]);
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
}
