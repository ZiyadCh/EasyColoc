<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ColocationController extends Controller
{
    /**
     * @param mixed $user_id
     */
    public function newColoc(Request $r): RedirectResponse
    {
        $v = $r->validate([
            'nom' => 'required|string|max:255',
        ]);
        //insert colocation into db
        $colocation = Colocation::create([
            'nom' => $v['nom'],
        ]);
        // user role change
        $user = auth()->user();
        $user->role = 'member';
        $user->isOwner = true;
        //add to pivot table
        $user->colocations()->attach($colocation->id);
        //save to db
        $user->save();
        return redirect()->route('colocDetails', [$colocation->id]);

    }
    /**
     * @param mixed $colocation_id
     */
    public function colocDetails($colocation_id): View
    {
        $coloc = Colocation::findOrFail($colocation_id);
        $members = $coloc->users;
        return view('colocation', [
            'members' => $members,
            'id' => $colocation_id,
        ]);
    }

}
