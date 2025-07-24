<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Traits\TenantScoped;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model
{
    protected $guarded = [];
    use TenantScoped;

    protected static function booted()
    {
        static::creating(fn($model) => $model->tenant_id = tenantId());
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function likes()
    {
        return $this->hasMany(PostLike::class);
    }

    public function views()
    {
        return $this->hasMany(PostView::class);
    }

    public function getEstimatedReadingTime(): int
    {

        $plainText = strip_tags($this->content);

        $wordCount = str_word_count($plainText);

        return max(1, ceil($wordCount / 200));
    }

}
