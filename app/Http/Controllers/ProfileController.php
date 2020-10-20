<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\RegisterProfileRequest;
use App\Http\Requests\UserCompanyRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('register.profile');
    }

    public function store(RegisterProfileRequest $request): void
    {
        $user = Auth::user();
        $user->has_profile = true;
        $user->fill($request->all())->save();
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function info()
    {
        $user = Auth::user();

        return $user->load('userCompany');
    }

    /**
     * Update the profile
     *
     * @param ProfileRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateUser(ProfileRequest $request)
    {
        auth()->user()->update($request->all());
    }

    public function updateUserCompany(UserCompanyRequest $request): void
    {
        $userCompany = Auth::user()->userCompany;
        $userCompany->update($request->all());
    }

    /**
     * Change the password
     *
     * @param PasswordRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);
    }
}
