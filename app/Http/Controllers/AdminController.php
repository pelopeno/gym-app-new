<?php

namespace App\Http\Controllers;

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

   
}
