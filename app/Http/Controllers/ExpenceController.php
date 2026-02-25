<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Http\Request;

class ExpenceController extends Controller
{
    public function index($colocation_id) {
        $coloc = Colocation::findOrFail($colocation_id);
        $members = $coloc->users;
        return view('expense-form',['members'=>$members,'id'=>$colocation_id]);
    }
    public function addExpence(Request $r,$col_id) {
        Expense::create([
            'payeur'=> $r->payeur,
            'montant'=> $r->montant,
            'categorie'=> $r->categorie,
        ]);
        $colocation = Colocation::find($col_id);
        $prix = $r->montant / $colocation->users()->count();
        $colocation->users()->increment('dette',$prix);
        $colocation->users()->increment('total_dette',$prix);
    }
}
