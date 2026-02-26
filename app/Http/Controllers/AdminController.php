<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    /**
     * @param mixed $id
     */
    public function bannUser($id): RedirectResponse {
        $user = User::findOrFail($id);
        $user->active = false;

        if ($user->isOwner) {
            return redirect()->route('transfer-owner',['current_owner_id'=>$id]);
        }

        $user->colocations()->detach();
        $user->save();
        return redirect()->back();
    }
    /**
     * @param mixed $id
     */
    public function activateUser($id): RedirectResponse {
        $user = User::findOrFail($id);
        $user->active = true;
        $user->save();
        return redirect()->back();
    }
    /**
     * @param mixed $current_owner_id
     */
    public function transfer($current_owner_id): View {

        $owner = User::findOrFail($current_owner_id);
        $colocation = $owner->colocations->first();
        $members = $colocation->users;

        return view('transfer-ownership',[
            'current_owner_id' => $current_owner_id,
            'colocation' => $colocation,
            'members' => $members
        ]);
    }
    /**
     * @param mixed $id
     * @param mixed $oldOwner
     */
    public function newOwner($id, $oldOwner): RedirectResponse{
        //$user = new owner
        //$banned = old owner thats gonna get banned
        $user = User::findOrFail($id);
        $banned = User::findOrFail($oldOwner);
        $user->isOwner = true;
        $banned->isOwner = false;
        $banned->active = false;
        $banned->role ='outcast';
        $banned->colocations()->detach();
        //enregister
        $user->save();
        $banned->save();

        return redirect()->route('dashboard');

    }
}
