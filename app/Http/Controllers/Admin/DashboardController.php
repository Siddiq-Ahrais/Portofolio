<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Project;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard with statistics.
     */
    public function __invoke(): View
    {
        return view('dashboard', [
            'totalProjects' => Project::count(),
            'totalMessages' => Message::count(),
            'unreadMessages' => Message::unread()->count(),
            'recentProjects' => Project::latest()->take(5)->get(),
            'recentMessages' => Message::latest()->take(5)->get(),
        ]);
    }
}
