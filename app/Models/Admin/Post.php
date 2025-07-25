<?php

namespace App\Models\Admin;

use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

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
