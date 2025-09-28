<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Review;

class UserController extends Controller
{
    //
    public function index()
    {
        $announcements = Announcement::with('user')->latest()->paginate(5);
        return view('dashboard', compact('announcements'));
    }

    public function listPosts()
    {
        $reviews = Review::where('status', 'approved')->latest()->paginate(5);
        return view('user.show', compact('reviews'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:300|min:5',
            'content' => 'required|string|max:255|min:10',
        ]);

        Review::create([
            'title'   => $request->title,
            'content' => $request->content,
            'status'  => 'pending',
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('user.show')->with('success', "Your review has been submitted and is awaiting approval.");
    }
}
