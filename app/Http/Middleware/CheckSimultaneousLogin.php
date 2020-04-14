<?php

namespace App\Http\Middleware;

use App\Events\MessageEvent;
use App\Models\Session;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CheckSimultaneousLogin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function handle($request, Closure $next)
    {
        //ログインしたuser_idがもしセッションにあったらセッションを消してログイン画面に飛ばす。
        if (Session::where('user_id', auth()->user()->id)->count() > 1) {
            Cookie::queue(Cookie::forget('XSRF-TOKEN'));
            Cookie::queue(Cookie::forget('salse_email_session'));
            $sessions = Session::where('user_id', auth()->user()->id)->get();

            event(new MessageEvent([$sessions[0]->user_agent, $sessions[1]->user_agent]));

            foreach ($sessions as $session) {
                $session->delete();
            }
        }

        return $next($request);
    }
}
