<?php

use Illuminate\Support\Facades\App;

if (!function_exists('tenantId')) {
    function tenantId(): int|null {
        return App::get('currentTenant')?->id;
    }
}
