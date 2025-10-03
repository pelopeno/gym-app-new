<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Announcement;
use App\Models\Category;
use App\LogsActivity;

class AnnouncementController extends Controller
{
    //
    use LogsActivity;

    public function index()
    {
        $posts = Announcement::with('user')
            ->latest()
            ->paginate(5, ['*'], 'posts_page');

        $trashed = Announcement::onlyTrashed()
            ->with('user')
            ->orderByDesc('deleted_at')
            ->paginate(5, ['*'], 'trashed_page');

        return view('admin.posts.index', compact('posts', 'trashed'));
    }

    public function addPost()
    {
        $categories = Category::all();
        return view('admin.posts.add', compact('categories'));
    }

    public function storePost(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:40|min:5',
            'content' => 'required|string|max:120|min:10',
            'category_id' => 'required|exists:categories,id',
        ]);

        Announcement::create([
            'title'   => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
        ]);
        $this->logActivity('Created', 'Announcement', ['title' => $request->title]);
        return redirect()->route('admin.posts.index')->with('success', "Post '{$request->title}' added successfully!");
    }

    public function editPost($id)
    {
        $categories = Category::all();
        $post = Announcement::findOrFail($id);
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function updatePost(Request $request, $id)
    {
        $post = Announcement::findOrFail($id);

        $request->validate([
            'title'   => 'required|string|max:40|min:5',
            'content' => 'required|string|max:120|min:10',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post->update([
            'title'   => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
        ]);
        $this->logActivity('Updated', 'Announcement',  [
            'id' => $post->id,
            'new_title' => $request->title
        ]);

        return redirect()->route('admin.posts.index')->with('success', "Announcement #{$id} updated successfully!");
    }

    public function deletePost($id)
    {
        $post = Announcement::findOrFail($id)->delete();
        $this->logActivity('Archived', 'Announcement',  ['id' => $id]);

        return redirect()->route('admin.posts.index')->with('success', "Announcement #{$id} deleted successfully!");
    }

    public function restorePost($id)
    {
        $post = Announcement::onlyTrashed()->findOrFail($id);
        $post->restore();

        $this->logActivity('Restored', 'Announcement',  ['id' => $id]);
        return redirect()->route('admin.posts.index')
            ->with('success', "Announcement #{$id} restored successfully!");
    }

    public function forceDeletePost($id)
    {
        $post = Announcement::onlyTrashed()->findOrFail($id);
        $post->forceDelete();

        $this->logActivity('Permanently Deleted', 'Announcement',  ['id' => $id]);
        return redirect()->route('admin.posts.index')
            ->with('success', "Announcement #{$id} permanently deleted!");
    }
}
