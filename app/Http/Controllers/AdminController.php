<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function bannUser($id) {
        $user = User::find($id);
        $user->active = false;

        if ($user->isOwner) {
            # code...
        }

        $user->save();
    }
}
