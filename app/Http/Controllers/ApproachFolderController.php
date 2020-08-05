<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApproachFolderRequest;
use App\Http\Resources\ApproachFolderResource;
use App\Models\ApproachFolder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApproachFolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $approachFolders = Auth::user()->approachFolders->sortByDesc('updated_at');
        return view('approach-folders.index', [
            'approachFolders' => ApproachFolderResource::collection($approachFolders),
        ]);
    }

    public function list(Request $request)
    {
        $folders = Approachfolder::likeSearch($request);
        return response()->json([
            'count' => $folders->count(),
            'folders' => ApproachFolderResource::collection($folders),
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
        return view('approach-folders.create', [
            'apprach_folder' => $request,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ApproachFolderRequest $request)
    {
        $folder = new ApproachFolder($request->all());
        Auth::user()->approachFolders()->save($folder);
        return redirect()->route('approach-folders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
     * @param ApproachFolder $approach_folder
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApproachFolder $approach_folder)
    {
        $this->authorize('delete', $approach_folder);
        $approach_folder->delete();
    }
}
