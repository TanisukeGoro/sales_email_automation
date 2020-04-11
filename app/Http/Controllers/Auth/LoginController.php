<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\HttpFoundation\Request;
use App\Models\Session;
use App\Models\User;

class LoginController extends Controller
{
  /*
        |--------------------------------------------------------------------------
        | Login Controller
        |--------------------------------------------------------------------------
        |
        | This controller handles authenticating users for the application and
        | redirecting them to your home screen. The controller uses a trait
        | to conveniently provide its functionality to your applications.
        |
        */

  use AuthenticatesUsers {
    validateLogin as _validateLogin;
  }

  /**
   * Where to redirect users after login.
   *
   * @var string
   */
  protected $redirectTo = '/home';

  /**
   * Create a new controller instance.
   */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  public function validateLogin(Request $request): void
  {
    $request->validate([
      $this->username() => [
        'required',
        'string',
        // function ($attribute, $value, $fail) {
        //   $user = User::where('email', $value)->first();

        //   if ((bool) $user) {
        //     $is_session = Session::where('user_id', $user->id)->exists();

        //     if ($is_session) {
        //       return $fail('既に他の人がログインしています。');
        //     }
        //   }
        // },
      ],
      'password' => 'required|string',
    ]);
  }
}
