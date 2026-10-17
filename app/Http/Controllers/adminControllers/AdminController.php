<?php

namespace App\Http\Controllers\adminControllers;

use App\Http\Controllers\Controller;
use App\Models\Comment as ModelsComment;
use App\Services\AdminService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(private AdminService $admin_service){}

    public function index() {
        return view('admin-dashboard.dashboard');
    }
    public function comment(Request $request) {
       $status = $request->query('status');
        $totalComments = ModelsComment::all()->count();
        $pendingComments = ModelsComment::where('status', 'pending')->count();
        $approvedComments = ModelsComment::where('status', 'approved')->count();
        $spamComments = ModelsComment::where('status', 'spam')->count();
        $comments =  ModelsComment::with('post')
       ->when($status , fn($query) => $query->where('status', $status))
       ->latest()->get();

        return view('admin-dashboard.comments', compact('comments', 'totalComments', 'pendingComments', 'approvedComments', 'spamComments'));
    }

    public function commentUpdateStatus(Request $request,ModelsComment $comment){
        $validate = $request->validate([
            'status' => 'required|string|in:approved,spam',
        ]);

        $comment->status = $validate['status'];

        $comment->save();

        return back()->with('success', $validate['status']);
    }

   
}
