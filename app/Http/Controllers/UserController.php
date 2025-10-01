<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;


class UserController extends Controller
{
    //
public function index(Request $request)
{
    $query = Announcement::with('user')->latest();

    // Check if naka apply filter
    if ($request->has('category') && $request->category != '') {
        $query->where('category_id', $request->category);
    }

    $announcements = $query->paginate(5);
    $categories = Category::all();

    return view('dashboard', compact('announcements', 'categories'));
}

    
}
