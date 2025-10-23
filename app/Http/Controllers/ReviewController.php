<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\LogsActivity;

class ReviewController extends Controller
{
    use LogsActivity;

    public function index()
    {
        $reviews = Review::with('images')->where('status', 'approved')->latest()->paginate(5);
        return view('user.show', compact('reviews'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|string|max:300|min:5',
            'content'   => 'required|string|max:255|min:10',
            'images'    => 'nullable',
            'images.*'  => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $review = Review::create([
            'title'   => $request->title,
            'content' => $request->content,
            'status'  => 'pending',
            'user_id' => Auth::id(),
        ]);

        if ($request->hasFile('images')) {
            $uploadDir = public_path('images/reviews');
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . bin2hex(random_bytes(5)) . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
                $file->move($uploadDir, $filename);

                $review->images()->create([
                    'path' => 'images/reviews/' . $filename,
                ]);
            }
        }

        $this->logActivity('Submitted', 'Review', ['title' => $request->title]);

        return redirect()->route('user.show')->with('success', 'Your review has been submitted and is awaiting approval.');
    }

    public function Reviews()
    {
        $reviews = Review::with('images')->where('status', 'pending')->paginate(5);
        return view('admin.reviews.index', compact('reviews'));
    }

    public function approveReview($id)
    {
        $review = Review::findOrFail($id);
        $review->status = 'approved';
        $review->save();

        $this->logActivity('Approved', 'Review', ['id' => $id]);
        return redirect()->route('admin.reviews.index')->with('success', 'Review approved successfully.');
    }

    public function rejectReview($id)
    {
        $review = Review::findOrFail($id);
        $review->status = 'rejected';
        $review->save();

        $this->logActivity('Rejected', 'Review', ['id' => $id]);
        return redirect()->route('admin.reviews.index')->with('success', 'Review rejected successfully.');
    }
}
