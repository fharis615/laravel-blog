<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'tags', 'user'])
                ->where('status', 'published')->latest()
                ->limit(4)->get();
                foreach($posts as $p)
                    {
                        $minReads = str($p->body)->wordCount() / 60;

                        $p['minReads'] = intval($minReads);
                    }
        return view('public.index', compact('posts'));
    }
    public function post(string $slug){
        $post = Post::with(['category', 'tags', 'user', 'comments' => function($query) {
                $query->where('status', 'approved');
            }])->where('slug', $slug)->first();

        return view('public.post', compact('post'));
    }
    public function storeComment(Request $request,Post $post)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:244',
            'email' => 'nullable|email',
            'body' => 'required|string|max:244',
        ]);

        $alreadyCommented = Comment::where('email', $validate['email'])->exists();

        if($alreadyCommented)
            {
                return back()->with('error', 'Already Commented.');
            }

        $validate['post_id'] = $post->id;

        Comment::create($validate);

        return back()->with('success', 'Your comment is pending let admin approved it.');
    }
}
