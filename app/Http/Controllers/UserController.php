<?php

namespace App\Http\Controllers;

use App\Models\Announcement;


class UserController extends Controller
{
    //
    public function index()
    {
        $announcements = Announcement::with('user')->latest()->paginate(5);
        return view('dashboard', compact('announcements'));
    }

    
}
