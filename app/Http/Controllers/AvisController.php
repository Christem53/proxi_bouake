<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvisController extends Controller
{
    public function create(Demande $demande)
    {
        // Vérifie que la demande appartient au client connecté
        if ($demande->client_id != Auth::id()) {
            abort(403);
        }

        // Vérifie que la demande est acceptée
        if ($demande->statut != 'acceptee') {
            return back()->with('error', 'Vous ne pouvez pas encore noter ce prestataire.');
        }

        // Vérifie qu'un avis n'existe pas déjà
        if ($demande->avis) {
            return back()->with('error', 'Vous avez déjà laissé un avis.');
        }

        return view('avis.create', compact('demande'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'demande_id' => 'required|exists:demandes,id',
            'note' => 'required|integer|min:1|max:5',
            'commentaire' => 'nullable|max:1000',
        ]);

        $demande = Demande::findOrFail($request->demande_id);

        Avis::create([
            'client_id' => Auth::id(),
            'prestataire_id' => $demande->prestataire_id,
            'demande_id' => $demande->id,
            'note' => $request->note,
            'commentaire' => $request->commentaire,
        ]);

        return redirect()
            ->route('demandes.client')
            ->with('success', 'Merci pour votre avis ⭐');
    }
}