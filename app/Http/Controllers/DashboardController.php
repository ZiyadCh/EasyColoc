<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): mixed
    {
        $bannedUsers = User::where('active',true)->get();
        return view('dashboard',['bannedUsers'=>$bannedUsers]);
    }
}
