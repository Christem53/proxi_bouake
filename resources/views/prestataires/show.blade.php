<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>
{{ $prestataire->nom_entreprise ?? $prestataire->user->name }} - ProxiBouaké
</title>

@vite(['resources/css/app.css','resources/js/app.js'])

</head>


<body class="bg-gray-100 text-gray-900">


<!-- NAVBAR -->

<nav class="bg-white shadow">

<div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">


<h1 class="text-2xl font-bold text-blue-600">
Proxi<span class="text-gray-900">Bouaké</span>
</h1>


<a href="{{ route('dashboard') }}"
class="text-gray-600 hover:text-blue-600">

Retour accueil

</a>


</div>

</nav>





<!-- CONTENU -->

<div class="max-w-5xl mx-auto px-6 py-10">



<div class="bg-white rounded-3xl shadow overflow-hidden">



<!-- PHOTO -->


@if($prestataire->photo)


<img
src="{{ asset('storage/'.$prestataire->photo) }}"
class="w-full h-72 object-cover">


@else


<div class="h-72 bg-blue-600 flex items-center justify-center text-white text-6xl font-bold">


{{ strtoupper(substr($prestataire->user->name,0,1)) }}


</div>


@endif





<div class="p-8">



<!-- INFORMATIONS -->


<h1 class="text-3xl font-bold">

{{ $prestataire->nom_entreprise ?? $prestataire->user->name }}

</h1>


<p class="mt-2 text-gray-500">

👤 {{ $prestataire->user->name }}

</p>



<p class="mt-3">

💻
{{ $prestataire->category?->name ?? 'Catégorie non définie' }}

</p>



<p class="mt-3">

📍
{{ $prestataire->ville }} - {{ $prestataire->quartier }}

</p>



<p class="mt-3">

📌
{{ $prestataire->adresse ?? 'Adresse non définie' }}

</p>



<p class="mt-3">

⭐
{{ $prestataire->experience ?? 0 }} ans d'expérience

</p>





<div class="mt-6 bg-gray-100 rounded-xl p-5">


<h2 class="font-bold text-xl mb-3">

Description

</h2>


<p class="text-gray-700">

{{ $prestataire->description }}

</p>


</div>




<!-- AVIS CLIENTS -->

<div class="mt-8">

    <h2 class="text-2xl font-bold mb-5">
        ⭐ Avis des clients
    </h2>

    @php
        $avis = $prestataire->avis;
    @endphp

    @if($avis->count())

        <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-5 mb-6">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-3xl font-bold text-yellow-600">
                        ⭐ {{ number_format($avis->avg('note'),1) }}/5
                    </p>

                    <p class="text-gray-600">
                        Basé sur {{ $avis->count() }} avis
                    </p>

                </div>

            </div>

        </div>

        @foreach($avis as $commentaire)

            <div class="border rounded-2xl p-5 mb-4">

                <div class="flex justify-between items-center">

                    <strong>
                        {{ $commentaire->client->name }}
                    </strong>

                    <span class="text-yellow-500 text-lg">
                        {{ str_repeat('⭐', $commentaire->note) }}
                    </span>

                </div>

                @if($commentaire->commentaire)

                    <p class="mt-3 text-gray-700">
                        {{ $commentaire->commentaire }}
                    </p>

                @endif

                <p class="text-sm text-gray-500 mt-3">
                    {{ $commentaire->created_at->diffForHumans() }}
                </p>

            </div>

        @endforeach

    @else

        <div class="bg-gray-50 border rounded-2xl p-6 text-center">

            <p class="text-gray-500">
                Aucun avis pour le moment.
            </p>

        </div>

    @endif

</div>


<!-- CONTACT -->


<a href="https://wa.me/225{{ $prestataire->whatsapp }}"
target="_blank"

class="block mt-6 bg-green-500 hover:bg-green-600 text-white text-center py-4 rounded-xl font-bold">


Contacter sur WhatsApp


</a>







<!-- PRESTATIONS -->


<div class="mt-10">


<h2 class="text-2xl font-bold mb-5">

Ses prestations

</h2>




<div class="grid md:grid-cols-2 gap-5">



@forelse($prestataire->prestations as $service)



<div class="border rounded-2xl p-5">



@if($service->image)


<img
src="{{ asset('storage/'.$service->image) }}"
class="h-40 w-full object-cover rounded-xl mb-4">


@endif




<h3 class="font-bold text-lg">

{{ $service->titre }}

</h3>



<p class="text-gray-600 mt-2">

{{ Str::limit($service->description,100) }}

</p>




<a href="{{ route('services.show',$service->id) }}"

class="block mt-4 bg-blue-600 text-white text-center py-3 rounded-xl">


Voir la prestation


</a>


</div>



@empty


<p class="text-gray-500">

Aucune prestation disponible.

</p>


@endforelse



</div>


</div>




</div>


</div>



</div>



<x-footer />

</body>

</html>
