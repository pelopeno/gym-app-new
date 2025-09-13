<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Announcement;

class AdminController extends Controller
{
    public function index()
    {
        $postCount = Announcement::count();
        $userCount = User::count();

        $recentActivities = [
            ['user' => 'John Doe', 'action' => 'Created a new post', 'date' => '2025-09-08'],
            ['user' => 'Jane Smith', 'action' => 'Updated profile', 'date' => '2025-09-07'],
            ['user' => 'Michael Lee', 'action' => 'Created a new post', 'date' => '2025-09-06'],
        ];

        return view('admin.dashboard', compact('postCount', 'userCount', 'recentActivities'));
    }

    public function listPosts()
    {
        $posts = Announcement::with('user')->latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function addPost()
    {
        return view('admin.posts.add');
    }

    public function storePost(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Announcement::create([
            'title'   => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('admin.posts.index')->with('success', "Post '{$request->title}' added successfully!");
    }

    public function editPost($id)
    {
        $post = Announcement::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }

    public function updatePost(Request $request, $id)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Announcement::findOrFail($id);
        $post->update([
            'title'   => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.posts.index')->with('success', "Post #{$id} updated successfully!");
    }
}
