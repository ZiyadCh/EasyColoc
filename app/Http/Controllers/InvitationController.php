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

        Mail::to($email)->send(new InvitationMail($colocation->nom));
        return back()->with('success', 'Invitation envoyé avec succès !');
    }
}
