<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Models\Colocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DebtController extends Controller
{
    public function show($id)
    {
        $colocation = Colocation::with('users')->findOrFail($id);
        $user = auth()->user();

        $owedToMe = Debt::where('owns', $user->id)
            ->where('payed', false)
            ->with('debtor')
            ->get();

        $iOwe = Debt::where('owned', $user->id)
            ->where('payed', false)
            ->with('creditor')
            ->get();

        return view('colocDetails', [
            'id' => $id,
            'members' => $colocation->users,
            'owedToMe' => $owedToMe,
            'iOwe' => $iOwe,
        ]);
    }

    public function settle($id)
    {
        $debt = Debt::findOrFail($id);
        $debt->update(['payed' => true]);

        return back()->with('success', 'Debt settled successfully.');
    }
}
