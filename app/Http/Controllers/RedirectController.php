<?php

namespace App\Http\Controllers;

use App\Models\RedirectUri;
use App\Models\UrlClickCount;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RedirectController extends Controller
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
    public function publish()
    {
        $redirect_uri = new RedirectUri();
        $redirect_uri->user_id = auth()->id();
        $redirect_uri->uri = route('redirect-link.index') . '/' . Str::uuid();
        $redirect_uri->save();

        return redirect()->route('profile.edit')->with('create_url', 'URLが発行されました！');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\RedirectUri $redirectUri
     * @param mixed $uuid
     *
     * @return \Illuminate\Http\Response
     */
    public function count($uuid)
    {
        if (!RedirectUri::where('uri', route('redirect-link.index') . '/' . $uuid)->exists()) {
            return redirect()->route('home');
        }

        $user_id = RedirectUri::where('uri', route('redirect-link.index') . '/' . $uuid)->first()->user_id;

        if (UrlClickCount::where('user_id', $user_id)->exists()) {
            $uri_click_count = UrlClickCount::where('user_id', $user_id)->first();
            ++$uri_click_count->count;
            $uri_click_count->save();
        } else {
            $uri_click_count = new UrlClickCount();
            $uri_click_count->user_id = $user_id;
            $uri_click_count->count = 1;
            $uri_click_count->save();
        }

        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\RedirectUri $redirectUri
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(RedirectUri $redirectUri)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\RedirectUri $redirectUri
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RedirectUri $redirectUri)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\RedirectUri $redirectUri
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(RedirectUri $redirectUri)
    {
    }
}
