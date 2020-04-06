<?php

namespace App\Http\Controllers;

use App\Http\Requests\TemplateRequest;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates = Auth::user()->templates()->orderBy('created_at', 'asc')->get();

        return view('template.index', [
            'templates' => $templates,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('template.create', [
            'template' => $request,
        ]);
    }

    public function confirm(TemplateRequest $request)
    {
        return view('template.show', [
            'template' => $request,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TemplateRequest $request)
    {
        $template = new Template();
        $template->user_id = Auth::id();
        $template->fill($request->all())->save();

        return redirect()->route('template.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template)
    {
        return view('template.show', [
            'template' => $template,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Template $template)
    {
        return view('template.create', [
            'template' => $template,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(TemplateRequest $request, Template $template)
    {
        $this->authorize('update', $template);

        $template->fill($request->all())->save();

        return redirect()->route('template.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $template)
    {
        $this->authorize('delete', $template);

        $template->delete();

        return redirect()->route('template.index');
    }
}
