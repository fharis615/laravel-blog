<?php

namespace App\Http\Controllers\adminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategory;
use App\Models\Category;
use App\Services\AdminService;

class CategoryController extends Controller
{
   public function __construct(private AdminService $admin_service){}

    public function index() {
        $categories = $this->admin_service->category();
        return view('admin-dashboard.categories', compact('categories'));
    }

     public function store(StoreCategory $request){
        
        $success = $this->admin_service->categoryStore($request);

        if(!$success)
            {
                return redirect()->route('admin::categories')->withErrors([
                    'name' => 'Duplicate Name Found',
                ]);
            }
        return redirect()->route('admin::categories')->with('success', 'Category Added Succesfully');

    }

    public function destroy(Category $category){
        $category->delete();
        return back()->with('success', 'Category Deleted Successfully.');
    }
    
    public function show(Category $category){
        return view('admin-dashboard.categories-edit', compact('category'));
    }

    public function update(StoreCategory $request, Category $category){
        $success = $this->admin_service->updateCategory($request, $category);
        
        if(!$success)
            {
                return redirect()->route('admin::categories')->withErrors([
                    'name' => 'Duplicate Name Found',
                ]);
            }
        return redirect()->route('admin::categories')->with('success', 'Category Updated Succesfully');
    }
}
