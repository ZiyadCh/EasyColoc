<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function user()
    {
        $bannedUsers = User::where('active', false)->get();
        if (auth()->user()->role === 'admin') {
            return redirect()->route('AdminDashboard');
        }
        return view('dashboard');
    }
    public function admin(): mixed
    {
        $bannedUsers = User::where('active', false)->get();
        $admin = auth()->user();
        $colocations = $admin->colocations;
        return view('admin-dashboard', [
            'bannedUsers' => $bannedUsers,
            'colocations' => $colocations,
        ]);
    }
}
