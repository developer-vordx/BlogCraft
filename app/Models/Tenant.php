<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\Multitenancy\Models\Tenant as BaseTenant;
class Tenant extends BaseTenant
{

    protected $fillable = ['name', 'slug'];
}
