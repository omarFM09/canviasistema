<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class RateLimitContactForm
{
   
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        $key = "contact_form_submissions_{$ip}";
        $requests = Cache::get($key, 0);
        if ($requests >= 5) {
            session()->flash('error', 'Has superado el límite de envíos por hora.');
            return redirect()->back();
            //return response()->json(['message' => 'Has superado el límite de envíos por hora.'], 429);
        }
        Cache::put($key, $requests + 1, now()->addHour());
        return $next($request);
    }
}
