<?php

namespace App\Http\Controllers\adminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Services\AdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct(private AdminService $admin_service){}

    public function index(Request $request){

        $status = $request->query('status');
        $posts = Post::with(['category', 'tags', 'user'])
        ->when($status, fn($query) => $query->where('status', $status))
        ->paginate(10);
        $allCount = Post::all()->count();
        $draftPosts = Post::where('status', 'draft')->count();
        $publishedPosts = Post::where('status', 'published')->count();
        return view('admin-dashboard.posts', compact('posts', 'draftPosts', 'publishedPosts', 'allCount'));
    }
    public function add(){
        $tag= Tag::all();
        $category = Category::all();
        $label = $tag->map(fn($item) => $item->name ?? 'Deleted tag');
        $labelIds = $tag->map(fn($item) => $item->id ?? 'Deleted tag');

        return view('admin-dashboard.add-posts', compact('label', 'labelIds', 'category'));
    }
    public function store(PostRequest $request){
       $this->admin_service->storePost($request, auth()->user()->id);
       return redirect()->route('admin::post')->with('success', 'Post Added Successfully.');
    }
    public function destroy(Post $post){
        $post->delete();
        Storage::disk('public')->delete($post->cover_image);
        return back()->with('success' , 'Post Deleted Succesfully.');
    }
    public function updateStatus(Post $post){
        if($post->status == 'published')
            {
                $post->status = 'draft';
            }else{

                $post->status = 'published';
            }
        $post->save();

        return back()->with('success', 'Post Published Succesfully!');
    }
}
