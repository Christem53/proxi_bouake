<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Proxi Bouaké</title>

    <link rel="stylesheet"
    href="https://unpkg.com/leaflet/dist/leaflet.css">

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

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

<form method="GET" action="{{ route('dashboard') }}"
class="bg-white mt-6 p-4 rounded-2xl flex flex-col md:flex-row gap-4">


<select 
name="category"
class="flex-1 px-5 py-3 rounded-xl border text-gray-800">


<option value="">
Toutes les catégories
</option>


@foreach(\App\Models\Category::all() as $category)

<option value="{{ $category->id }}"
{{ request('category') == $category->id ? 'selected' : '' }}>

{{ $category->name }}

</option>

@endforeach


</select>



<input 
type="text"
name="quartier"
value="{{ request('quartier') }}"
placeholder="Votre quartier"
class="flex-1 px-5 py-3 rounded-xl border text-gray-800">



<button 
type="submit"
class="bg-blue-600 text-white px-8 py-3 rounded-xl">

Rechercher

</button>


</form>


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



<div 
onclick="focusPrestataire({{ $prestataire->id }})"
class="bg-white rounded-2xl shadow p-6 hover:shadow-xl transition flex flex-col h-full cursor-pointer">



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

<a href="{{ route('prestataire.profil',$prestataire->id) }}"
class="block mt-5 bg-gray-800 text-white text-center py-3 rounded-xl">

Voir le profil

</a>

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


<!-- CARTE GEOLOCALISATION DASHBOARD -->

<section class="max-w-7xl mx-auto px-6 mt-12 mb-10">


<h2 class="text-2xl font-bold mb-6 text-center">

Prestataires autour de vous 📍

</h2>



<div class="bg-white rounded-2xl shadow p-6 max-w-10xl mx-auto">


<p class="text-gray-500 mb-5">

Visualisez les professionnels proches de votre position.

</p>



<div id="dashboardMap"
class="w-full h-96 rounded-2xl overflow-hidden">
</div>



</div>


</section>

<x-footer />

<script>

function toggleMenu(){

    let menu = document.getElementById('userMenu');

    menu.classList.toggle('hidden');

}

document.addEventListener('DOMContentLoaded', function(){


let map = L.map('dashboardMap')
.setView(
[7.6939,-5.0306],
13
);



L.tileLayer(
'https://tile.openstreetmap.org/{z}/{x}/{y}.png',
{
attribution:'&copy; OpenStreetMap contributors'
}
)
.addTo(map);



let prestataires = @json($prestataires);



let positions = {};

let markersPrestataires = {};



prestataires.forEach(function(prestataire){



if(prestataire.latitude && prestataire.longitude){



let lat = parseFloat(prestataire.latitude);

let lng = parseFloat(prestataire.longitude);



let cle = lat.toFixed(3)+","+lng.toFixed(3);



if(positions[cle]){


let index = positions[cle];


lat += index * 0.0002;

lng += index * 0.0002;


positions[cle]++;


}else{


positions[cle]=1;


}




let nom = prestataire.nom_entreprise
? prestataire.nom_entreprise
: prestataire.user.name;



let marker = L.marker([
    lat,
    lng
])
.addTo(map);


marker.bindPopup(`


<div>


<h3 class="font-bold">

${nom}

</h3>


<p>

👤 ${prestataire.user.name}

</p>


<p>

🛠 ${prestataire.category.name}

</p>


<p>

📍 ${prestataire.ville} - ${prestataire.quartier}

</p>


<p>

📞 ${prestataire.whatsapp}

</p>


</div>


`);

markersPrestataires[prestataire.id] = marker;

}



});




// POSITION CLIENT


if(navigator.geolocation){



navigator.geolocation.getCurrentPosition(

function(position){



let lat = position.coords.latitude;

let lng = position.coords.longitude;




L.marker([lat,lng],{


icon:L.icon({

iconUrl:
'https://cdn-icons-png.flaticon.com/512/64/64113.png',

iconSize:[35,35]

})


})

.addTo(map)

.bindPopup(

"📍 Vous êtes ici"

);



map.flyTo(
[lat,lng],
14
);



}


);



}




});

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