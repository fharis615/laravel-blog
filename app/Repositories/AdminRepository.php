<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Mews\Purifier\Facades\Purifier;

class AdminRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function storeCategory(string $name){
        Category::create([
            'name' => $name,
        ]);
    }
    public function storeTag(string $name){
        Tag::create([
            'name' => $name,
        ]);
    }
    public function storePost(array $validated) :Model{
       return Post::create([
            'user_id' => $validated['user_id'],
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'cover_image' => $validated['cover_image'],
            'slug' => $validated['slug'],
            'body' => $validated['body'],
            'status' => $validated['status'],
            'excerpt' => $validated['excerpt'],
       ]);
    }
}
