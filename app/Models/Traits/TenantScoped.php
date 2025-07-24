<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait TenantScoped
{
    protected static function bootTenantScoped()
    {
        static::addGlobalScope('tenant', function (Builder $builder) {
            if (tenantId()) {
                $builder->where('tenant_id', tenantId());
            }
        });

        static::creating(function ($model) {
            if (tenantId()) {
                $model->tenant_id = tenantId();
            }
        });
    }
}
