<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApproachEditRequest;
use App\Models\Approach;
use App\Models\ApproachFolder;
use Illuminate\Http\Request;

class ApproachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ApproachFolder $folder
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ApproachFolder $folder)
    {
        $this->authorize('view', $folder);
        $approaches = $folder->approaches()->get();
        return view('approaches.index', [
            'approaches' => $approaches->load('company'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param ApproachFolder $folder
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, ApproachFolder $folder)
    {
        $this->authorize('view', $folder);
        return view('approaches.create', [
            'approaches' => $request,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param ApproachFolder $folder
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ApproachFolder $folder)
    {
        $this->authorize('view', $folder);

        $stored_companies = $folder->approaches()->pluck('company_id')->toArray();

        $store_companies = [];

        foreach ($request->companies as $key => $company) {
            if (!\in_array($company['company_id'], $stored_companies, true)) {
                $store_companies[] = $company;
            }
        }

        if (\count($store_companies) > 0) {
            $folder->approaches()->createMany($store_companies);
            return response()->json([
                'status' => 201,
            ]);
        }

        // もし配列ならバルクインサートしてapiレスポンスを返す
      // そうでないなら保存して戻る
    }

    public function confirm(ApproachEditRequest $request, ApproachFolder $folder, Approach $approach)
    {
        $this->checkRelation($folder, $approach);

        return view('approaches.show', [
            'approach' => $approach,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param ApproachFolder $folder
     * @param Approach $approach
     *
     * @return \Illuminate\Http\Response
     */
    public function show(ApproachFolder $folder, Approach $approach)
    {
        $this->checkRelation($folder, $approach);
        return view('approaches.show', [
            'approach' => $approach,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @param ApproachFolder $folder
     * @param Approach $approach
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(ApproachFolder $folder, Approach $approach)
    {
        $this->checkRelation($folder, $approach);
        return view('approaches.create', [
            'approach' => $approach,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @param Approach $approach
     * @param ApproachFolder $folder
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ApproachEditRequest $request, ApproachFolder $folder, Approach $approach)
    {
        $this->checkRelation($folder, $approach);
        $approach->fill($request->all())->save();
        return redirect()->route(
            'approaches.show',
            ['folder' => $request->folder,
                'approach' => $request->approach,
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param ApproachEditRequest $request
     * @param Approach $approach
     * @param ApproachFolder $folder
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApproachEditRequest $request, ApproachFolder $folder, Approach $approach)
    {
        $this->checkRelation($folder, $approach);
        $approach->delete();
        $approaches = $folder->approaches()->get();
        return redirect()->route(
            'approaches.index',
            ['folder' => $folder->id,
                'approaches' => $approaches->load('company'),
            ]
        );
    }

    private function checkRelation(ApproachFolder $folder, Approach $approach): void
    {
        if ($folder->id !== $approach->approach_folder_id) {
            abort(404);
        }
    }
}
