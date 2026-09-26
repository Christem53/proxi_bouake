<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Prestataire;
use App\Models\Prestation;

class DashboardController extends Controller
{

    public function index()
    {

        $user = Auth::user();



        // Prestataires acceptés
        $prestataires = Prestataire::where('statut','accepte')

        ->whereNotNull('latitude')
        ->whereNotNull('longitude')

        ->when(request('category'), function($query){

            $query->where('category_id', request('category'));

        })

        ->when(request('quartier'), function($query){

            $query->where('quartier','like','%'.request('quartier').'%');

        })

        ->with([
            'user',
            'category',
            'prestations',
            'avis',
            'demandes'
        ])

        ->get();




        // Nombre de demandes envoyées par le client connecté
        $demandesEnvoyees = Auth::user()
    ->demandesEnvoyees()
    ->count();

$demandesAcceptees = Auth::user()
    ->demandesEnvoyees()
    ->where('statut', 'acceptee')
    ->count();

$demandesRefusees = Auth::user()
    ->demandesEnvoyees()
    ->where('statut', 'refusee')
    ->count();



        return view('dashboard', compact(
    'prestataires',
    'demandesEnvoyees',
    'demandesAcceptees',
    'demandesRefusees'
));

    }

}
