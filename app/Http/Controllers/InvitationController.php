<?php

namespace App\Http\Controllers;

use App\Mail\InvitationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{
    public function sendInvitation(Request $request)
    {
        //$email = $request->input('email');
        $email = 'fuckaround@gmail.com';
        //$colocation = $request->input('colocation');
        $colocation = 'testing yoolo';
        Mail::to($email)->send(new InvitationMail($colocation));
        return back()->with('success', 'Email envoyé avec succès !');
    }
}
