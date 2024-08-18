<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next)
    {
        // dd('t');
        // dd(auth()->user());
        if (Auth::check() && Auth::user()->id === 1) {
            return $next($request);
        }
        abort(404);
        // return response()->json(['error' => 'Unauthorized'], 403);
    }
}
