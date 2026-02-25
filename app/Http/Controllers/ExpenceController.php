<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenceController extends Controller
{
    public function index($colocation_id) {
        $coloc = Colocation::findOrFail($colocation_id);
        $members = $coloc->users;
        return view('expense-form',['members'=>$members,'id'=>$colocation_id]);
    }
    public function list($colocation_id) {
        $expenses = Expense::where('colocation_id', $colocation_id)->get();
        return view('expenses-list',['expenses'=> $expenses]);
    }
    public function addExpence(Request $r,$col_id) {
        //ajout d'expence dans db
        $colocation = Colocation::find($col_id);
        $colocation->expenses()->create([
            'payeur'=> $r->payeur,
            'montant'=> $r->montant,
            'categorie'=> $r->categorie,
        ]);
        //definir users dans une colocation
        $prix = $r->montant / $colocation->users()->count();
        //spliting the bill
        $colocation->users()->whereNot('id',$r->payeur)->increment('dette',$prix);
        $colocation->users()->whereNot('id',$r->payeur)->increment('total_dette',$prix);
        return redirect()->route('colocDetails',[$colocation->id]);
    }
}
