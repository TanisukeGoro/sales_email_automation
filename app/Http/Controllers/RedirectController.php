<?php

namespace App\Http\Controllers;

use App\Models\RedirectUri;
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
    //
  }

  public function publish()
  {
    $redirect_uri = new RedirectUri();
    $redirect_uri->user_id = auth()->id();
    $redirect_uri->uri = config("app", "url");
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\RedirectUri  $redirectUri
   * @return \Illuminate\Http\Response
   */
  public function show(RedirectUri $redirectUri)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\RedirectUri  $redirectUri
   * @return \Illuminate\Http\Response
   */
  public function edit(RedirectUri $redirectUri)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\RedirectUri  $redirectUri
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, RedirectUri $redirectUri)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\RedirectUri  $redirectUri
   * @return \Illuminate\Http\Response
   */
  public function destroy(RedirectUri $redirectUri)
  {
    //
  }
}
