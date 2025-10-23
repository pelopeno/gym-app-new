<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\LogsActivity;
use Intervention\Image\ImageManager;

class ReviewController extends Controller
{
    //
    use LogsActivity;

    public function index()
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imagePath = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/reviews'), $filename);
            $imagePath = 'images/reviews/' . $filename;

            if(!file_exists(public_path('images/reviews'))){
                mkdir(public_path('images/reviews'), 0755, true);
            }
        }
        Review::create([
            'title'   => $request->title,
            'content' => $request->content,
            'status'  => 'pending',
            'user_id' => Auth::id(),
            'image_path' => $imagePath ?? null,
        ]);

        $this->logActivity('Submitted', 'Review',  ['title' => $request->title]);

        return redirect()->route('user.show')->with('success', "Your review has been submitted and is awaiting approval.");
    }

    public function Reviews()
    {
        $reviews = Review::where('status', 'pending')->paginate(5);
        return view('admin.reviews.index', compact('reviews'));
    }

    public function approveReview($id)
    {
        $reviews = Review::findOrFail($id);
        $reviews->status = 'approved';
        $reviews->save();

        $this->logActivity('Approved', 'Review', ['id' => $id]);
        return redirect()->route('admin.reviews.index')->with('success', 'Review approved successfully.');
    }

    public function rejectReview($id)
    {
        $reviews = Review::findOrFail($id);
        $reviews->status = 'rejected';
        $reviews->save();

        $this->logActivity('Rejected', 'Review', ['id' => $id]);
        return redirect()->route('admin.reviews.index')->with('success', 'Review rejected successfully.');
    }
}
