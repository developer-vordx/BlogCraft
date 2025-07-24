<?php

namespace App\Multitenancy;


use Spatie\Multitenancy\Models\Tenant;
use Spatie\Multitenancy\TenantFinder\TenantFinder;

class CustomDomainTenantFinder extends TenantFinder
{
    public function findForRequest(\Illuminate\Http\Request $request): ?\Spatie\Multitenancy\Contracts\IsTenant
    {
        $subdomain = explode('.', $request->getHost())[0];

        return Tenant::where('slug', $subdomain)->first();
    }
}
