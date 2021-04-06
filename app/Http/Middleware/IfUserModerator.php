<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class IfUserModerator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    public function handle(Request $request, Closure $next)
    {
        if ($this->auth->user() && $this->auth->user()->notify !== "1") {
            abort(403, 'Unauthorized action.Go back');
        }
        return $next($request);
    }
}
