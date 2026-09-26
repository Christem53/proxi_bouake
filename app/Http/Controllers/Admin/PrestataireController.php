<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prestataire;
use App\Models\Prestation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestataireController extends Controller
{

    /**
     * Liste des demandes prestataires
     */
    public function index()
    {

        $prestataires = Prestataire::with(['user','category'])
            ->latest()
            ->get();


        return view('admin.prestataires.index', compact('prestataires'));

    }



    /**
     * Voir une demande
     */
    public function show(string $id)
    {

        $prestataire = Prestataire::with(['user','category'])
            ->findOrFail($id);


        return view('admin.prestataires.show', compact('prestataire'));

    }


    public function accepter($id)
{
    $prestataire = Prestataire::findOrFail($id);

    // Récupérer l'utilisateur associé
    $user = $prestataire->user;

    // Accepter la demande
    $prestataire->update([
        'statut' => 'accepte',
        'photo' => $user->photo,
    ]);

    // Donner le rôle prestataire à l'utilisateur
    $user->update([
        'role' => 'prestataire'
    ]);

    return redirect()
        ->route('prestataires.index')
        ->with('success', 'Prestataire accepté avec succès');
}





public function refuser($id)
{

    $prestataire = Prestataire::findOrFail($id);


    $prestataire->update([

        'statut' => 'refuse'

    ]);



    return redirect()
        ->route('prestataires.index')
        ->with('success','Demande refusée');

}

/**
 * Liste des prestations publiées
 */
public function prestations()
{

    $prestations = Prestation::with([
        'user',
        'category'
    ])
    ->latest()
    ->get();


    return view('admin.prestations.index', compact('prestations'));

}

/**
 * Accepter une prestation
 */
public function accepterPrestation($id)
{

    $prestation = Prestation::findOrFail($id);


    $prestation->update([

        'statut' => 'actif'

    ]);


    return redirect()
        ->route('admin.prestations.index')
        ->with('success','Prestation acceptée avec succès');

}


/**
 * Refuser une prestation
 */
public function refuserPrestation($id)
{

    $prestation = Prestation::findOrFail($id);


    $prestation->update([

        'statut' => 'refuse'

    ]);


    return redirect()
        ->route('admin.prestations.index')
        ->with('success','Prestation refusée');

}

/**
 * Désactiver une prestation
 */
public function desactiverPrestation($id)
{

    $prestation = Prestation::findOrFail($id);


    $prestation->update([

        'statut' => 'inactif'

    ]);


    return redirect()
        ->route('admin.prestations.index')
        ->with('success','Prestation désactivée avec succès');

}





/**
 * Réactiver une prestation
 */
public function reactiverPrestation($id)
{

    $prestation = Prestation::findOrFail($id);


    $prestation->update([

        'statut' => 'actif'

    ]);


    return redirect()
        ->route('admin.prestations.index')
        ->with('success','Prestation réactivée avec succès');

}

/**
 * Afficher une pièce d'identité
 */
public function piece(Prestataire $prestataire, string $type)
{
    // Vérifier que le type demandé est autorisé
    if (!in_array($type, ['recto', 'verso'])) {
        abort(404);
    }

    // Récupérer le chemin du document
    $path = $type === 'recto'
        ? $prestataire->piece_identite_recto
        : $prestataire->piece_identite_verso;

    // Vérifier que le document existe
    if (!$path || !Storage::disk('local')->exists($path)) {
        abort(404);
    }

    // Afficher le document sans le rendre public
    return response()->file(
        Storage::disk('local')->path($path)
    );
}

}
