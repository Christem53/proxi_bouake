<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Devenir prestataire - ProxiBouaké</title>

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


<a href="/dashboard"
class="text-gray-600 hover:text-blue-600">

Accueil

</a>


<a href="#"
class="text-gray-600 hover:text-blue-600">

Mes demandes

</a>




<!-- PROFIL DROPDOWN -->

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


@if(Auth::user()->role == 'admin')

Administrateur

@elseif(Auth::user()->role == 'prestataire')

Prestataire

@else

Client

@endif


</p>


</div>


</button>





<div id="userMenu"
class="hidden absolute right-0 mt-3 w-52 bg-white rounded-xl shadow-lg z-50">


<a href="{{ route('profile.edit') }}"
class="block px-5 py-3 hover:bg-gray-100">

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


</div>


</div>

</nav>





<!-- CONTENU -->


<div class="max-w-6xl mx-auto px-6 py-10">



<div class="mb-8">

<h2 class="text-3xl font-bold">

🚀 Devenir prestataire

</h2>


<p class="text-gray-600 mt-2">

Présentez votre activité et proposez vos services aux habitants de Bouaké.

</p>


</div>





<div class="bg-white rounded-3xl shadow p-8">



<form action="{{ route('prestataire.store') }}" method="POST">

@csrf




<!-- Catégorie -->

<div class="mb-6">

<label class="block font-semibold mb-2">
Catégorie de service
</label>


<select name="category_id"
class="w-full rounded-xl border-gray-300 px-4 py-3">


<option value="">
Choisir une catégorie
</option>


@foreach($categories as $category)

<option value="{{ $category->id }}">

{{ $category->icon }} {{ $category->name }}

</option>

@endforeach


</select>


@error('category_id')

<p class="text-red-600 text-sm mt-2">

{{ $message }}

</p>

@enderror


</div>





<!-- Nom entreprise -->


<div class="mb-6">

<label class="block font-semibold mb-2">

Nom de l'entreprise (facultatif)

</label>


<input
type="text"
name="nom_entreprise"
value="{{ old('nom_entreprise') }}"
placeholder="Ex: Emmanuel Informatique"
class="w-full rounded-xl border-gray-300 px-4 py-3">


</div>





<!-- Description -->


<div class="mb-6">


<label class="block font-semibold mb-2">

Description de votre service

</label>


<textarea
name="description"
rows="5"
placeholder="Présentez votre activité..."
class="w-full rounded-xl border-gray-300 px-4 py-3">{{ old('description') }}</textarea>


</div>





<!-- WhatsApp -->


<div class="mb-6">

<label class="block font-semibold mb-2">

Numéro WhatsApp

</label>


<input
type="text"
name="whatsapp"
value="{{ old('whatsapp') }}"
placeholder="Ex: 0700000000"
class="w-full rounded-xl border-gray-300 px-4 py-3">


</div>





<!-- Ville + Quartier -->


<div class="grid md:grid-cols-2 gap-6">


<div>

<label class="block font-semibold mb-2">

Ville

</label>


<input
type="text"
name="ville"
value="{{ old('ville') }}"
placeholder="Ex: Bouaké"
class="w-full rounded-xl border-gray-300 px-4 py-3">


</div>



<div>

<label class="block font-semibold mb-2">

Quartier

</label>


<input
type="text"
name="quartier"
value="{{ old('quartier') }}"
placeholder="Ex: Air France"
class="w-full rounded-xl border-gray-300 px-4 py-3">


</div>


</div>





<!-- Expérience -->


<div class="mb-6 mt-6">


<label class="block font-semibold mb-2">

Années d'expérience

</label>


<input
type="number"
name="experience"
value="{{ old('experience') }}"
min="0"
class="w-full rounded-xl border-gray-300 px-4 py-3">


</div>





<!-- Adresse -->


<div class="mb-6">

<label class="block font-semibold mb-2">

Adresse (facultatif)

</label>


<input
type="text"
name="adresse"
value="{{ old('adresse') }}"
class="w-full rounded-xl border-gray-300 px-4 py-3">


</div>


<input type="hidden" name="latitude" id="latitude">

<input type="hidden" name="longitude" id="longitude">



<div class="mb-6">

    <label class="block font-semibold mb-2">
        Localisation
    </label>

    <button
        type="button"
        onclick="getLocation()"
        class="px-5 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700">

        📍 Utiliser ma position actuelle

    </button>

    <p id="locationStatus" class="text-sm text-gray-500 mt-3">
        Aucune position détectée.
    </p>

</div>


<button
type="submit"
class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700">

Envoyer ma demande

</button>



</form>



</div>



</div>




<x-footer />



<script>

function toggleMenu(){

    let menu = document.getElementById('userMenu');

    menu.classList.toggle('hidden');

}



function getLocation(){

    if(!navigator.geolocation){

        alert("La géolocalisation n'est pas supportée par votre navigateur.");

        return;

    }

    document.getElementById('locationStatus').innerHTML =
        "Recherche de votre position...";

    navigator.geolocation.getCurrentPosition(

        function(position){

            document.getElementById('latitude').value =
                position.coords.latitude;

            document.getElementById('longitude').value =
                position.coords.longitude;

            document.getElementById('locationStatus').innerHTML =
                "✅ Position enregistrée avec succès.";

        },

        function(){

            document.getElementById('locationStatus').innerHTML =
                "❌ Impossible de récupérer votre position.";

        }

    );

}

</script>



</body>

</html>