<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): mixed
    {
        $bannedUsers = User::where('active', false)->get();
        return view('dashboard', ['bannedUsers' => $bannedUsers]);
    }
}
