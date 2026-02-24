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
        //insert colocation into db
        $colocation = Colocation::create([
            'nom'=> $v['nom']
        ]);
        // user role change
        $user =auth()->user();
        $user->role = 'member';
        $user->isOwner = true;
        //add to pivot table
        $user->colocations()->attach($colocation->id);
        //save to db
        $user->save();
    }

    public function leaveColoc(): void {
        # code...
    }

}
