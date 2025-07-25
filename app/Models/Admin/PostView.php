<?php

namespace App\Models\Admin;

use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostView extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'ip_address',
        'tenant_id',
    ];

    // Relationships
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
