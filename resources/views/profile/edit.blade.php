<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Mon Profil - ProxiBouaké</title>

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

Client

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





<!-- CONTENU PROFIL -->


<div class="max-w-6xl mx-auto px-6 py-10">



<!-- CARTE PROFIL -->


<div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-3xl p-8 text-white shadow-lg">


<div class="flex items-center gap-6">


<div class="w-24 h-24 bg-white text-blue-600 rounded-full flex items-center justify-center text-4xl font-bold">


{{ strtoupper(substr(Auth::user()->name,0,1)) }}


</div>



<div>

<h1 class="text-3xl font-bold">

{{ Auth::user()->name }}

</h1>


<p class="text-blue-100">

@if(Auth::user()->role == 'admin')

Administrateur ProxiBouaké

@elseif(Auth::user()->role == 'prestataire')

Prestataire ProxiBouaké

@else

Client ProxiBouaké

@endif

</p>


</div>


</div>


</div>






<!-- INFORMATIONS -->


<div class="bg-white rounded-3xl shadow p-8 mt-8">


<h2 class="text-2xl font-bold mb-6">

Informations personnelles

</h2>


@include('profile.partials.update-profile-information-form')


</div>






<!-- PASSWORD -->


<div class="bg-white rounded-3xl shadow p-8 mt-8">


<h2 class="text-2xl font-bold mb-6">

Sécurité

</h2>


@include('profile.partials.update-password-form')


</div>



<!-- DEVENIR PRESTATAIRE -->

<div class="bg-white rounded-3xl shadow p-8 mt-8">

<h2 class="text-2xl font-bold mb-4">
Devenir prestataire
</h2>

<p class="text-gray-600 mb-6">
Vous proposez un service ? Rejoignez ProxiBouaké en tant que prestataire.
</p>

<a href="{{ route('prestataire.create') }}"
class="inline-block px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700">

🚀 Devenir prestataire

</a>

</div>



<!-- DELETE -->


<div class="bg-white rounded-3xl shadow p-8 mt-8">


<h2 class="text-2xl font-bold text-red-600 mb-6">

Supprimer le compte

</h2>


@include('profile.partials.delete-user-form')


</div>



</div>





<x-footer />





<script>

function toggleMenu(){

let menu=document.getElementById('userMenu');

menu.classList.toggle('hidden');

}

</script>


</body>

</html>