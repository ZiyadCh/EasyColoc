<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Mail\InvitationMail;
use App\Models\Colocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

    public function joinColocation($token)
    {
        $invite = Invitation::where('token', $token)->first();

        if (!$invite || $invite->expires_at->isPast()) {
            return redirect('/login')->with('error', 'Lien invalide ou expiré.');
        }

        if (!auth()->check()) {
            session()->put('url.intended', url()->current());

            return redirect('/login')->with('info', 'Connectez-vous ou créez un compte pour accepter.');
        }

        $user = auth()->user();
        if ($user->colocations()->exists() && $user->role != 'admin') {
            return redirect('/dashboard')->with('colocationError', 'vouz appartenir deja a une colocation!');
        }

        if ($user->role == 'outcast') {
            $user->role = 'member';
            $user->save();
        }

        $user->colocations()->syncWithoutDetaching([$invite->colocation_id]);

        $invite->delete();

        return redirect('/dashboard')->with('success', 'Bienvenue dans votre nouvelle colocation !');
    }
}
