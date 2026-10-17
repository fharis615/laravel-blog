<?php

namespace App\Http\Controllers\adminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Services\AdminService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct(private AdminService $admin_service){}

    public function index(){
        $tags = $this->admin_service->tags();
        return view('admin-dashboard.tags', compact('tags'));
    }
    public function store(TagRequest $request){
        $success = $this->admin_service->storeTag($request);
        if(!$success){
            return redirect()->route('admin::tags')->withErrors([
                'name' => "Duplicated name found",
            ]);
        }
        return redirect()->route('admin::tags')->with('success', 'Tag Added Succefully!');
    }
    public function show(Tag $tag){
        return view('admin-dashboard.tags-edit', compact('tag'));
    }
    public function update(TagRequest $request,Tag $tag){
        $success = $this->admin_service->updateTag($request, $tag);
        if(!$success){
            return redirect()->route('admin::tags')->withErrors([
                'name' => "Duplicated name found",
            ]);
        }
        return redirect()->route('admin::tags')->with('success', 'Tag Updated Succefully!');
    }
    public function destroy(Tag $tag){
        $tag->delete();
        return redirect()->route('admin::tags')->with('success', 'Tag deleted Succefully!');
    }
}
