<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckActivatedUser
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->user()->activated) {
            return redirect()->route('notActiveAccount');
        }
        return $next($request);
    }
}
