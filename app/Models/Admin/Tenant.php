<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

use Spatie\Multitenancy\Models\Tenant as BaseTenant;
class Tenant extends BaseTenant
{

    protected $fillable = ['name', 'slug'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
