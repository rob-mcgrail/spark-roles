<?php

namespace ZiNETHQ\SparkRoles\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class HasCurrentTeam
{
    /**
     * @var Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * Create a new HasPermission instance.
     *
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($auth->user()->currentTeam) {
            return $next($request);
        }

        return redirect('/');
    }
}
