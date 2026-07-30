<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Prestation;
use App\Models\Prestataire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class DemandeController extends Controller
{
    /**
     * Afficher le formulaire de demande.
     */
    public function create($id)
    {
        $prestation = Prestation::findOrFail($id);

        $prestataire = Prestataire::where('user_id', $prestation->user_id)->firstOrFail();

        return view('demandes.create', compact(
            'prestation',
            'prestataire'
        ));
    }

    /**
     * Enregistrer une demande.
     */
    public function store(Request $request)
    {
        $request->validate([
            'prestation_id' => 'required|exists:prestations,id',
            'prestataire_id' => 'required|exists:prestataires,id',
            'message' => 'nullable|string|max:1000',
        ]);

        $demande = Demande::create([
            'client_id' => Auth::id(),
            'prestataire_id' => $request->prestataire_id,
            'prestation_id' => $request->prestation_id,
            'message' => $request->message,
            'statut' => 'en_attente',
        ]);

        Notification::create([
    'prestataire_id' => $demande->prestataire_id,
    'demande_id' => $demande->id,
    'message' => 'Vous avez reçu une nouvelle demande',
    'lu' => false
]);
        

        return redirect()
            ->route('dashboard')
            ->with('success', 'Votre demande a été envoyée avec succès.');
    }

    public function index()
{
    $prestataire = Auth::user()->prestataire;


    $demandes = Demande::where(
        'prestataire_id',
        $prestataire->id
    )
    ->with([
        'client',
        'prestation'
    ])
    ->latest()
    ->get();


    return view('demandes.index', compact('demandes'));
}

public function accepter($id)
{
    $demande = Demande::findOrFail($id);


    $demande->update([
        'statut'=>'acceptee'
    ]);


    Notification::create([
        'prestataire_id'=>$demande->prestataire_id,
        'demande_id'=>$demande->id,
        'message'=>'Votre demande a été acceptée.',
        'lu'=>false
    ]);


    return back()->with(
        'success',
        'Demande acceptée avec succès.'
    );
}

public function refuser($id)
{
    $demande = Demande::findOrFail($id);


    $demande->update([
        'statut'=>'refusee'
    ]);


    Notification::create([
        'prestataire_id'=>$demande->prestataire_id,
        'demande_id'=>$demande->id,
        'message'=>'Votre demande a été refusée.',
        'lu'=>false
    ]);


    return back()->with(
        'success',
        'Demande refusée.'
    );
}

public function mesDemandes()
{
    $demandes = Auth::user()
        ->demandesEnvoyees()
        ->with([
            'prestation',
            'prestataire.user'
        ])
        ->latest()
        ->get();

    return view('demandes.mes-demandes', compact('demandes'));
}
    
}