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
        return view('approaches.create', [
            'approaches' => $request,
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
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ApproachEditRequest $request, Approach $approach)
    {
        $approach->fill($request->all())->save();
        return redirect()->route('template.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param ApproachEditRequest $request
     * @param Approach $approach
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApproachEditRequest $request, Approach $approach)
    {
        $this->authorize('delete', $approach);
        $approach->delete();
        return view('approaches.index');
    }

    private function checkRelation(ApproachFolder $folder, Approach $approach): void
    {
        if ($folder->id !== $approach->approach_folder_id) {
            abort(404);
        }
    }
}
