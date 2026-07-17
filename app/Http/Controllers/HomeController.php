<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Prestation;
use App\Models\Prestataire;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
{

    // Récupération des catégories
    $categories = Category::all();



    // Récupération des prestations actives
    $prestations = Prestation::where('statut','actif')
        ->with([
            'user',
            'category'
        ])
        ->latest()
        ->get();



    // Récupération des prestataires avec localisation GPS
    $prestataires = \App\Models\Prestataire::whereNotNull('latitude')
        ->whereNotNull('longitude')
        ->with([
            'user',
            'category'
        ])
        ->get();



    return view('welcome', compact(
        'categories',
        'prestations',
        'prestataires'
    ));

}






    public function search(Request $request)
    {

        $categories = Category::all();

        $recherche = $request->service;

        $quartier = $request->quartier;

        $prestations = Prestation::where('statut', 'actif')

            ->with([
                'user',
                'category'
            ])

            ->where(function ($query) use ($recherche) {

                if ($recherche) {

                    $query->where('titre', 'LIKE', '%' . $recherche . '%')

                        ->orWhere('description', 'LIKE', '%' . $recherche . '%')

                        ->orWhereHas('category', function ($q) use ($recherche) {

                            $q->where('name', 'LIKE', '%' . $recherche . '%');

                        });

                }

            })

            ->latest()

            ->get();

        // Prestataires avec GPS
        $prestataires = Prestataire::with([
                'user',
                'category'
            ])
            ->where('statut', 'accepte')
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->get();

        return view('welcome', compact(
            'categories',
            'prestations',
            'prestataires'
        ));

    }

}