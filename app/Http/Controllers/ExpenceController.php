<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Http\Request;

class ExpenceController extends Controller
{
    public function addExpence(Request $r,$col_id) {
        Expense::create([
            'payeur'=> $r->payeur,
            'montant'=> $r->montant,
            'categorie'=> $r->categorie,
        ]);
        $prix = $r->montant / User::count();
        $colocation = Colocation::find($col_id);
        $colocation->users()->increment('dette',$r->montant);
    }
}
