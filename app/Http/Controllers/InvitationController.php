<?php

namespace App\Http\Controllers;

use App\Mail\InvitationMail;
use App\Models\Colocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{
    public function sendInvitation(Request $request, $id)
    {
        $email = $request->input('email');
        $colocation = Colocation::findOrFail($id);

        $token = Str::random(40);

        Invitation::create([
            'email' => $email,
            'colocation_id' => $id,
            'token' => $token,
            'expires_at' => now()->addDays(1),
        ]);

        Mail::to($email)->send(new InvitationMail($colocation->nom, $token));

        return back()->with('success', 'Invitation envoyée !');
    }

    public function joinColocation($email, $colocation_id)
    {
        $user = User::where('email', $email)->get();
        $colocation = Colocation::findOrFail($colocation_id);
        $colocation->users->attach($user);
    }
}
