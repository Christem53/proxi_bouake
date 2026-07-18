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
    ->with([
        'user',
        'category',
        'prestations'
    ])
    ->get();



        // Nombre de demandes envoyées par le client
        $demandesEnvoyees = 0;



        // Nombre de services terminés
        $servicesTermines = 0;



        // Nombre favoris
        $favoris = 0;



        return view('dashboard', compact(
            'prestataires',
            'demandesEnvoyees',
            'servicesTermines',
            'favoris'
        ));

    }

}