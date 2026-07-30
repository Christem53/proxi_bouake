<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">

<title>Mes demandes - ProxiBouaké</title>

@vite(['resources/css/app.css','resources/js/app.js'])

</head>


<body class="bg-gray-100">


<div class="max-w-5xl mx-auto py-10 px-6">


<div class="max-w-5xl mx-auto py-10 px-6">

    <div class="bg-white rounded-3xl shadow p-8">

        <!-- Bouton retour -->
        <div class="mb-6">
            <a href="{{ route('dashboard') }}"
               class="inline-flex items-center gap-2 bg-gray-800 hover:bg-gray-900 text-white px-5 py-3 rounded-xl transition">
                ← Retour au tableau de bord
            </a>
        </div>

        <h1 class="text-3xl font-bold mb-8">
            📩 Mes demandes
        </h1>



@forelse($demandes as $demande)


<div class="border rounded-2xl p-6 mb-5">


<h2 class="text-xl font-bold">

{{ $demande->prestation->titre }}

</h2>


<p class="mt-3">

👤 Prestataire :

<strong>
{{ $demande->prestataire->user->name }}
</strong>

</p>

<p class="mt-3">

📞 Téléphone :

<strong>
{{ $demande->client->phone ?? 'Non renseigné' }}
</strong>

</p>

<p>

💬 Message :

{{ $demande->message }}

</p>



<p class="mt-3">

Statut :

@if($demande->statut == 'en_attente')

    <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700">
        🟡 En attente
    </span>

@elseif($demande->statut == 'acceptee')

    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700">
        🟢 Acceptée
    </span>

@elseif($demande->statut == 'refusee')

    <span class="px-3 py-1 rounded-full bg-red-100 text-red-700">
        🔴 Refusée
    </span>

@else

    <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-700">
        {{ $demande->statut }}
    </span>

@endif

@if($demande->statut == 'acceptee' && !$demande->avis)

<div class="mt-5">

    <a href="{{ route('avis.create',$demande->id) }}"
       class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded-xl">

        ⭐ Laisser un avis

    </a>

</div>

@endif



</p>


</div>


@empty


<p class="text-gray-500">

Vous n'avez envoyé aucune demande.

</p>


@endforelse



</div>


</div>


</body>

</html>