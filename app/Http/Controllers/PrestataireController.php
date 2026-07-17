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

        ]);


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

            'statut' => 'en_attente',

        ]);


        return redirect()
            ->route('dashboard')
            ->with('success','Votre demande de prestataire a été envoyée.');
    }

}