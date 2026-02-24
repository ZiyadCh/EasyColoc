<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use Illuminate\Http\Request;


class ColocationController extends Controller
{
    /**
     * @param mixed $user_id
     */
    public function newColoc(Request $r): void {
        $v = $r->validate([
            'nom' => 'required|string|max:255',
        ]);
        // user role change
        $user =auth()->user();
        $user->role = 'member';
        $user->isOwner = true;
        $user->save();
        //insert colocation into db
        Colocation::create([
            'nom'=> $v['nom']
        ]);
    }
}
