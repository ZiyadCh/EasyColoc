<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Expense;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index($id)
    {
        $categories = Categorie::where('colocation_id', $id)->get();
        return view('categories', ['coloc' => $id,'categories' => $categories]);
    }

    public function addCategorie(Request $request, $coloc)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Categorie::create([
            'name' => $request->name,
            'colocation_id' => $coloc,
        ]);

        return redirect()->back()->with('success', 'categorie enregistre avec success');
    }


    public function destroy($id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();

        return redirect()->back();
    }
}
