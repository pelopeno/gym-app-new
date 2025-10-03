<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Announcement;
use App\Models\ActivityLog;

class AdminController extends Controller
{
    public function index()
    {
        $postCount = Announcement::count();
        $userCount = User::count();
        $logs = ActivityLog::with('user')
            ->latest()
            ->paginate(10);

        return view('admin.dashboard', compact('postCount', 'userCount', 'logs'));
    }
}
