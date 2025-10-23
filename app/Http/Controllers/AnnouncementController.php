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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/announcements'), $filename);
            $imagePath = 'images/announcements/' . $filename;

            if(!file_exists(public_path('images/announcements'))){
                mkdir(public_path('images/announcements'), 0755, true);
            }
        }
        Announcement::create([
            'title'   => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'image_path' => $imagePath ?? null,
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $post->image_path;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $imagePath = 'images/announcements/' . $filename;

        if (!file_exists(public_path('images/announcements'))) {
            mkdir(public_path('images/announcements'), 0755, true);
        }

        if($post->image_path && file_exists(public_path($post->image_path))) {
            unlink(public_path($post->image_path));
        }

        $file->move(public_path('images/announcements'), $filename);

        $post->update([
            'title'   => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'image_path' => $imagePath
        ]);

        $this->logActivity('Updated', 'Announcement',  [
            'id' => $post->id,
            'new_title' => $request->title
        ]);

        return redirect()->route('admin.posts.index')->with('success', "Announcement #{$id} updated successfully!");
        }
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
