<?php

namespace App\Models;

use App\Models\Traits\TenantScoped;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use TenantScoped;
    protected $guarded = [];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->tenant_id = tenantId();
        });
    }

}
