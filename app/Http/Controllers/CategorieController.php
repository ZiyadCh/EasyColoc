<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index($id)
    {
        return view('categories', ['coloc' => $id]);
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
}
