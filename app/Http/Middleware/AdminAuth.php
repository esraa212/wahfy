<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    /**
     * @param $request
     * @param Closure $next
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('dashboard')->check()) {
            return redirect('/dashboard/login?redirectTo=' . $request->getPathInfo());
        }

        return $next($request);
    }
}
