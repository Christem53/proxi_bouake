<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">

<title>Mes demandes - ProxiBouaké</title>

@vite(['resources/css/app.css','resources/js/app.js'])

</head>


<body class="bg-gray-100">


<div class="max-w-5xl mx-auto py-10 px-6">


<div class="bg-white rounded-3xl shadow p-8">

<div class="mb-6">
    <a href="{{ route('profile.edit') }}"
       class="inline-flex items-center gap-2 bg-gray-800 hover:bg-gray-900 text-white px-5 py-3 rounded-xl transition">
        ← Retour au tableau de bord
    </a>
</div>

<h1 class="text-3xl font-bold mb-8">

📩 Demandes reçues

</h1>



@forelse($demandes as $demande)


<div class="border rounded-2xl p-6 mb-5">


<h2 class="text-xl font-bold">

{{ $demande->prestation->titre }}

</h2>



<p class="mt-3">

👤 Client :
<strong>
{{ $demande->client->name }}
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

<span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700">

{{ $demande->statut }}

</span>


</p>

<div class="flex gap-3 mt-4">

    <a href="tel:{{ $demande->client->phone }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl">
        📞 Appeler
    </a>

    <a href="https://wa.me/225{{ $demande->client->phone }}"
       target="_blank"
       class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl">
        💬 WhatsApp
    </a>

</div>



<div class="flex gap-3 mt-5">


<form method="POST" action="{{ route('demandes.accepter',$demande->id) }}">

@csrf

<button
class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-xl">

✅ Accepter

</button>

</form>



<form method="POST" action="{{ route('demandes.refuser',$demande->id) }}">

@csrf

<button
class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-xl">

❌ Refuser

</button>

</form>


</div>


</div>



@empty


<p class="text-gray-500">

Aucune demande reçue.

</p>


@endforelse



</div>


</div>


</body>

</html>