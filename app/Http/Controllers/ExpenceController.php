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
    public function index($colocation_id): View
    {
        $coloc = Colocation::findOrFail($colocation_id);
        $members = $coloc->users;
        $categories = $coloc->categories;

        return view('expense-form', [
            'members' => $members,
            'id' => $colocation_id,
            'categories' => $categories,
        ]);
    }

    public function list($colocation_id): View
    {
        $colocation = Colocation::findOrFail($colocation_id);

        $expenses = $colocation->expenses()->with(['category','user'])->latest()->get();

        return view('expenses-list', [
            'expenses' => $expenses,
        ]);
    }
    /**
     * @param mixed $col_id
     */
    public function addExpence(Request $r, $col_id): RedirectResponse
    {
        $r->validate([
            'montant' => 'required|numeric|min:1',
        ]);
        //getting the colocation
        $colocation = Colocation::findOrFail($col_id);

        $colocation->expenses()->create([
            'payeur' => $r->payeur,
            'montant' => $r->montant,
            'category_id' => $r->categorie,
        ]);

        $prix = $r->montant / $colocation->users()->count();

        //add the dette to other users
        $colocation->users()->whereNot('id', $r->payeur)->increment('dette', $prix);
        $colocation->users()->whereNot('id', $r->payeur)->increment('total_dette', $prix);

        $members = $colocation->users;

        foreach ($members as $member) {
            if ($member->id == $r->payeur) {
                continue;
            }

            Debt::create([
                'owned' => $member->id,
                'owns' => $r->payeur,
                'amount' => $prix,
                'payed' => false,
            ]);
        }

        return redirect()->route('colocDetails', [$colocation->id]);
    }
}
