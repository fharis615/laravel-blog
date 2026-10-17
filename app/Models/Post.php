<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    protected $fillable = ['user_id', 'category_id', 'title', 'cover_image', 'slug', 'body', 'status', 'excerpt'];

    public function tags() :BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }
    public function category() :BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function comments() :HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
