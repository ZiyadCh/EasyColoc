<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use App\Models\User;
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
        $user = auth()->user();

        $v = $r->validate([
            'nom' => 'required|string|max:255',
        ]);
        //insert colocation into db
        $colocation = Colocation::create([
            'nom' => $v['nom'],
            'owner_id' => $user->id,
        ]);
        // user role change
        if ($user->role == 'admin') {
        } else {
            $user->role = 'member';
        }

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
    public function leaveColocation($id)
    {
        $user = auth()->user();
        $user->colocation()->detach($id);
    }
}
