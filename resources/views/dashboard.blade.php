<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Proxi Bouaké</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>



<body class="bg-gray-100 text-gray-900">


<!-- NAVBAR -->

<nav class="bg-white shadow">

<div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">


<h1 class="text-2xl font-bold text-blue-600">
    Proxi<span class="text-gray-900">Bouaké</span>
</h1>


<div class="flex items-center gap-6">


<a href="#" class="text-gray-600 hover:text-blue-600">
Accueil
</a>


<a href="#" class="text-gray-600 hover:text-blue-600">
Mes demandes
</a>



<div class="relative">

    <button 
        onclick="toggleMenu()"
        class="flex items-center gap-3">

        <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold">
            {{ strtoupper(substr(Auth::user()->name,0,1)) }}
        </div>

        <div class="text-left">

            <p class="font-semibold">
                {{ Auth::user()->name }}
            </p>

            <p class="text-sm text-gray-500">
                Client
            </p>

        </div>

        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M19 9l-7 7-7-7"/>
        </svg>

    </button>



    <!-- MENU -->

    <div id="userMenu"
    class="hidden absolute right-0 mt-3 w-52 bg-white rounded-xl shadow-lg z-50">


        <a href="{{ route('profile.edit') }}"
        class="block px-5 py-3 hover:bg-gray-100 text-gray-700">

            👤 Mon profil

        </a>



        <form method="POST" action="{{ route('logout') }}">

            @csrf

            <button type="submit"
            class="w-full text-left px-5 py-3 text-red-600 hover:bg-gray-100">

                🚪 Déconnexion

            </button>

        </form>


    </div>

</div>

</nav>




<!-- CONTENU -->

<div class="max-w-7xl mx-auto px-6 py-10">



<!-- BIENVENUE -->

<div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-3xl p-8 text-white">


<h2 class="text-3xl font-bold">
Bonjour {{ Auth::user()->name }} 👋
</h2>


<p class="mt-3 text-lg">
Quel service recherchez-vous aujourd'hui ?
</p>



<!-- RECHERCHE -->

<div class="bg-white mt-6 p-4 rounded-2xl flex flex-col md:flex-row gap-4">


<input 
type="text"
placeholder="Ex: mécanicien, chauffeur, coiffeur..."
class="flex-1 px-5 py-3 rounded-xl border text-gray-800">


<input 
type="text"
placeholder="Votre quartier"
class="flex-1 px-5 py-3 rounded-xl border text-gray-800">


<button class="bg-blue-600 text-white px-8 py-3 rounded-xl">

Rechercher

</button>


</div>


</div>





<!-- STATISTIQUES -->


<div class="grid md:grid-cols-3 gap-6 mt-10">


<div class="bg-white p-6 rounded-2xl shadow">

<h3 class="text-gray-500">
Demandes envoyées
</h3>

<p class="text-3xl font-bold text-blue-600">
{{ $demandesEnvoyees }}
</p>

</div>




<div class="bg-white p-6 rounded-2xl shadow">

<h3 class="text-gray-500">
Services terminés
</h3>

<p class="text-3xl font-bold text-green-600">
{{ $servicesTermines }}
</p>

</div>




<div class="bg-white p-6 rounded-2xl shadow">

<h3 class="text-gray-500">
Favoris
</h3>

<p class="text-3xl font-bold text-orange-500">
{{ $favoris }}
</p>

</div>


</div>







<!-- CATEGORIES -->


<section class="mt-12">


<h2 class="text-2xl font-bold mb-6">
Catégories populaires
</h2>



<div class="grid md:grid-cols-4 gap-6">


<div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl">

<div class="text-4xl">
🚗
</div>

<h3 class="font-bold mt-3">
Transport
</h3>

</div>



<div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl">

<div class="text-4xl">
🔧
</div>

<h3 class="font-bold mt-3">
Dépannage
</h3>

</div>




<div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl">

<div class="text-4xl">
💻
</div>

<h3 class="font-bold mt-3">
Informatique
</h3>

</div>




<div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl">

<div class="text-4xl">
🏠
</div>

<h3 class="font-bold mt-3">
Maison
</h3>

</div>



</div>


</section>






<!-- PRESTATAIRES -->

<section class="mt-12">


<h2 class="text-2xl font-bold mb-6">
Prestataires proches de vous
</h2>



<div class="grid md:grid-cols-3 gap-6">



@forelse($prestataires as $prestataire)



<div class="bg-white rounded-2xl shadow p-6 hover:shadow-xl transition flex flex-col h-full">



<div class="flex items-center gap-4 mb-4">


<div class="w-14 h-14 rounded-full bg-blue-600 text-white flex items-center justify-center text-xl font-bold">

{{ strtoupper(substr($prestataire->user->name,0,1)) }}

</div>



<div>

<h3 class="font-bold text-lg">

@if($prestataire->nom_entreprise)

{{ $prestataire->nom_entreprise }}

@else

{{ $prestataire->user->name }}

@endif

</h3>


<p class="text-gray-500 text-sm">

{{ $prestataire->category->name }}

</p>


</div>


</div>




<div class="mt-3">

<p class="text-gray-600 leading-relaxed h-16 overflow-hidden">

{{ $prestataire->description }}

</p>

</div>


@foreach($prestataire->prestations as $service)

<a href="{{ route('services.show',$service->id) }}"
class="block mt-5 bg-blue-600 text-white text-center py-3 rounded-xl">

Voir {{ $service->titre }}

</a>

@endforeach


<div class="mt-4 space-y-2">


<p>

📍 {{ $prestataire->ville }} - {{ $prestataire->quartier }}

</p>



<p>

⭐ {{ $prestataire->experience }} ans d'expérience

</p>



<p>

📞 {{ $prestataire->whatsapp }}

</p>



</div>





<div class="flex gap-3 mt-5">



<a href="https://wa.me/225{{ $prestataire->whatsapp }}"
target="_blank"
class="flex-1 text-center bg-green-500 text-white py-2 rounded-xl hover:bg-green-600">

WhatsApp

</a>



<a href="tel:{{ $prestataire->whatsapp }}"
class="flex-1 text-center bg-blue-600 text-white py-2 rounded-xl hover:bg-blue-700">

Appeler

</a>



</div>



</div>




@empty


<div class="bg-white rounded-2xl shadow p-8 text-center md:col-span-3">


<p class="text-gray-500">

Aucun prestataire disponible actuellement.

</p>



</div>


@endforelse




</div>


</section>



</div>



<x-footer />

<script>

function toggleMenu(){

    let menu = document.getElementById('userMenu');

    menu.classList.toggle('hidden');

}


</script>

<!-- MODAL IMAGE -->

<div id="imageModal"
class="hidden fixed inset-0 bg-black bg-opacity-80 z-50 flex items-center justify-center">


<div class="relative">


<button 
onclick="closeImage()"
class="absolute top-2 right-2 bg-white text-black rounded-full w-10 h-10 text-xl">

✕

</button>



<img id="modalImage"
src=""
class="max-w-4xl max-h-[90vh] rounded-xl shadow-lg">


</div>


</div>



<script>


function openImage(image){


    document.getElementById('modalImage').src = image;

    document.getElementById('imageModal')
    .classList.remove('hidden');


}



function closeImage(){


    document.getElementById('imageModal')
    .classList.add('hidden');


}


</script>
</body>
</html>