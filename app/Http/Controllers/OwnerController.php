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
        $user->colocations()->detach();
        return redirect()->back();
    }
}
