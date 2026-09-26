<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Prestataire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrestataireController extends Controller
{

    public function create()
    {
        $categories = Category::all();

        return view('demande.create', compact('categories'));
    }


    public function store(Request $request)
    {
    $request->validate([

        'category_id' => 'required',
        'nom_entreprise' => 'nullable',
        'description' => 'required',
        'whatsapp' => 'required',
        'ville' => 'required',
        'quartier' => 'required',
        'adresse' => 'nullable',
        'experience' => 'required|integer',

        // Pièce d'identité
        'piece_identite_recto' => 'required|file|mimes:jpg,jpeg,png,webp,pdf|max:5120',
        'piece_identite_verso' => 'required|file|mimes:jpg,jpeg,png,webp,pdf|max:5120',

    ]);

    // Enregistrement des pièces d'identité dans le stockage privé
    $pieceRecto = $request->file('piece_identite_recto')
        ->store('pieces-identite');

    $pieceVerso = $request->file('piece_identite_verso')
        ->store('pieces-identite');


    Prestataire::create([

        'user_id' => Auth::id(),

        'category_id' => $request->category_id,

        'nom_entreprise' => $request->nom_entreprise,

        'description' => $request->description,

        'whatsapp' => $request->whatsapp,

        'ville' => $request->ville,

        'quartier' => $request->quartier,

        'adresse' => $request->adresse,

        'experience' => $request->experience,

        'latitude' => $request->latitude,

        'longitude' => $request->longitude,

        'piece_identite_recto' => $pieceRecto,

        'piece_identite_verso' => $pieceVerso,

        'statut' => 'en_attente',

    ]);


    return redirect()
        ->route('dashboard')
        ->with('success', 'Votre demande de prestataire a été envoyée.');
}

    public function show(Prestataire $prestataire)
{
    $prestataire->load([
        'prestations',
        'category',
        'user'
    ]);

    return view('prestataires.show', compact('prestataire'));
}

}
