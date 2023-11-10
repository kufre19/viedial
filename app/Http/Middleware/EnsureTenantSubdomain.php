<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class EnsureTenantSubdomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

         // Extract the subdomain from the request
        $subdomain = explode('.', $request->getHost())[0];
        $tenants = Config::get("tenants");
        $allowed_subs = [];

        foreach ($tenants as $key => $tenant) {
            array_push($allowed_subs,$tenant['domain']);

        }


        // Check if the subdomain is part of your known tenants
        
        if (in_array($subdomain,$allowed_subs)) { // Add more conditions as needed
            return $next($request);
        }

        // Redirect or abort if it's not a tenant subdomain
        // You can also return a 404 or any other response
        return abort(404); // Or redirect to your main site
    }
}
