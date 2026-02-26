<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function bannUser($id) {
        $user = User::findOrFail($id);
        $user->active = false;

        if ($user->isOwner) {
            return redirect()->route('transfer-owner',['current_owner_id'=>$id]);
        }

        $user->save();
    }
    public function transfer($current_owner_id) {

        $owner = User::findOrFail($current_owner_id);
        $colocation = $owner->colocations->first();
        $members = $colocation->users;

        return view('transfer-ownership',[
            'current_owner_id' => $current_owner_id,
            'colocation' => $colocation,
            'members' => $members
        ]);
    }
}
