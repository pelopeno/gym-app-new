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
        $announcements = Announcement::all();

        return view('dashboard', compact('announcements'));
    }

    public function listPosts()
    {
        $reviews = Review::latest()->paginate(5);
        return view('user.show', compact('reviews'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Review::create([
            'title'   => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('user.show')->with('success', "Review '{$request->title}' added successfully!");
    }
}
