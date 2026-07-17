<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prestataire;
use App\Models\Prestation;
use Illuminate\Http\Request;

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


    // Modifier le statut de la demande

    $prestataire->update([

        'statut' => 'accepte'

    ]);



    // Modifier le rôle de l'utilisateur

    $prestataire->user->update([

        'role' => 'prestataire'

    ]);



    return redirect()
        ->route('prestataires.index')
        ->with('success','Prestataire accepté avec succès');

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

}