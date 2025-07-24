<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Tenant;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class IdentifyTenant
{
    public function handle($request, Closure $next)
    {


        $host = $request->getHost();

        $subdomain = explode('.', $host)[0];

        $tenant = Tenant::where('slug', $subdomain)->first();
        if (!$tenant) {
            abort(403, 'Tenant not found');
        }

        if (Auth::check() && Auth::user()->tenant_id !== $tenant->id) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->withErrors([
                'message' => 'Access denied: You are not authorized for this tenant.',
            ]);
        }

        App::instance('tenant', $tenant);
        config(['app.tenant_id' => $tenant->id]);

        return $next($request);
    }
}
