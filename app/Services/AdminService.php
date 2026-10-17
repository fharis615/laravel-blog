<?php

namespace App\Services;

use App\Http\Requests\PostRequest;
use App\Http\Requests\StoreCategory;
use App\Http\Requests\TagRequest;
use App\Models\Category;
use App\Models\Tag;
use App\Repositories\AdminRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class AdminService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private AdminRepository $admin_repository){}

    public function category() :Collection{
        return Category::withCount('posts')->get();
    }
    public function categoryStore(StoreCategory $request) :bool{
        $validated = $request->validated();
        $ifExits = Category::where('name', $validated['name'])->exists();
        if($ifExits){return false;}
        $this->admin_repository->storeCategory($validated['name']);
        return true;
    }
    public function updateCategory(StoreCategory $request ,Category $category) :bool{
        $validated = $request->validated();
        $ifExits = Category::where('name', $validated['name'])->exists();
        if($ifExits){return false;}
        $category->name = $validated['name'];
        $category->save();
        return true;
    }
    public function tags() :Collection{
        return Tag::withCount('posts')->get();
    }
    public function storeTag(TagRequest $request) :bool{
        $validated = $request->validated();
        $ifExits = Tag::where('name', $validated['name'])->exists();
        if($ifExits){return false;}
        $this->admin_repository->storeTag($validated['name']);
        return true;
    }
    public function updateTag(TagRequest $request, Tag $tag) :bool{
        $validated = $request->validated();
        $ifExits = Tag::where('name', $validated['name'])->exists();
        if($ifExits){return false;}
        $tag->name = $validated['name'];
        $tag->save();
        return true;
    }
    public function storePost(PostRequest $request, int $owner) :void{
        $validated = $request->validated();
        $validated['user_id'] = $owner;
        if($request->hasFile('cover_image'))
            {
                $validated['cover_image'] = $request->file('cover_image')->store('cover', 'public');
            }
            DB::transaction(function () use ($validated){
                $post  = $this->admin_repository->storePost($validated);

                $post->tags()->attach($validated['tags']);
            });
    }
}
