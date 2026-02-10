<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Save;
use Illuminate\Support\Facades\Session;

class SaveSelector
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Session::has('save_id')) {
            return redirect()->route('index');
        }
        $save = Save::find(Session::get('save_id'));
        if (!$save) {
            return redirect()->route('index');
        }
        $request->merge(['save' => $save]);
        return $next($request);
    }
}
