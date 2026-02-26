<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use App\Models\Debt;
use App\Models\Expense;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ExpenceController extends Controller
{
    /**
     * @param mixed $colocation_id
     */
    public function index($colocation_id): View {
        $coloc = Colocation::findOrFail($colocation_id);
        $members = $coloc->users;
        return view('expense-form',['members'=>$members,'id'=>$colocation_id]);
    }
    /**
     * @param mixed $colocation_id
     */
    public function list($colocation_id): View {
        $colocation = Colocation::find($colocation_id);
        $expenses = $colocation->expenses()->get();
        return view('expenses-list',['expenses'=> $expenses]);
    }
    /**
     * @param mixed $col_id
     */
    public function addExpence(Request $r, $col_id): RedirectResponse {
        //ajout d'expence dans db
        $colocation = Colocation::findOrFail($col_id);
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

        //add personal debt
        $members = $colocation->users;

           foreach ($members as $member) {

                if ($member->id == $r->payeur) {
                    continue;
                }

                Debt::create([
                    'owned'     => $member->id,
                    'owns'   => $r->payeur,
                    'amount'        => $prix,
                    'payed'       => false,
                ]);
            }
            return redirect()->route('colocDetails',[$colocation->id]);
        }
    }
