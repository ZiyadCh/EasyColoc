<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;

class OwnerController extends Controller
{
    //
    public function retirerUser($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $colocation = $user->colocations()->first();
        if ($user->id == auth()->user()->id) {
            return redirect()->back();
        }
        //if user has dette
        if ($user->dette > 0) {
            $user->decrement('reputation');
            $autre = $colocation->users->where('id', '!=', $user->id);
            $prix = $user->dette / $autre->count();
            //divide the money
            foreach ($autre as $a) {
                $a->increment('dette', $prix);
            }
        }

        $user->colocations()->detach();
        return redirect()->back();
    }
}
