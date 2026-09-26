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


<a href="{{ route('demandes.index') }}"
class="text-gray-600 hover:text-blue-600">

Demandes reçues

</a>



<!-- PROFIL DROPDOWN -->

<div class="relative">


<button
onclick="toggleMenu()"
class="flex items-center gap-3">


<div class="w-10 h-10 rounded-full overflow-hidden bg-blue-600 text-white flex items-center justify-center font-bold">

    @if(Auth::user()->photo)
        <img
            src="{{ asset('storage/' . Auth::user()->photo) }}"
            alt="Photo de profil"
            class="w-full h-full object-cover"
        >
    @else
        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
    @endif

</div>



<div class="text-left">

<p class="font-semibold">

{{ Auth::user()->name }}

</p>


<p class="text-sm text-gray-500">
    @if(Auth::user()->role === 'prestataire')
        Prestataire
    @elseif(Auth::user()->role === 'admin')
        Administrateur
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





<!-- CONTENU PROFIL -->


<div class="max-w-6xl mx-auto px-6 py-10">



<!-- CARTE PROFIL -->


<div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-3xl p-8 text-white shadow-lg">


<div class="flex items-center gap-6">


<div class="w-24 h-24 bg-white text-blue-600 rounded-full overflow-hidden flex items-center justify-center text-4xl font-bold">

    @if(Auth::user()->photo)

        <img
            src="{{ asset('storage/' . Auth::user()->photo) }}"
            alt="Photo de profil de {{ Auth::user()->name }}"
            class="w-full h-full object-cover"
        >

    @else

        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

    @endif

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

    @if(Auth::user()->role == 'client')

        @if($demandePrestataire && $demandePrestataire->statut === 'en_attente')

            <!-- DEMANDE EN COURS -->

            <div class="flex items-start gap-4">

                <div class="w-12 h-12 rounded-xl bg-yellow-100 flex items-center justify-center text-2xl">
                    ⏳
                </div>

                <div>

                    <h3 class="text-lg font-bold text-gray-900">
                        Demande en cours de traitement
                    </h3>

                    <p class="mt-2 text-gray-600">
                        Votre demande pour devenir prestataire est actuellement
                        en cours de traitement.
                    </p>

                    <p class="mt-2 text-sm text-gray-500">
                        Veuillez patienter pendant que notre équipe examine
                        votre demande.
                    </p>

                </div>

            </div>


        @elseif($demandePrestataire && $demandePrestataire->statut === 'refuse')

            <!-- DEMANDE REFUSÉE -->

            <div class="flex items-start gap-4">

                <div class="w-12 h-12 rounded-xl bg-red-100 flex items-center justify-center text-2xl">
                    ❌
                </div>

                <div>

                    <h3 class="text-lg font-bold text-gray-900">
                        Demande refusée
                    </h3>

                    <p class="mt-2 text-gray-600">
                        Votre précédente demande pour devenir prestataire
                        n'a pas été acceptée.
                    </p>

                    <a
                        href="{{ route('demande.create') }}"
                        class="inline-flex items-center gap-2 mt-4 px-5 py-3 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition"
                    >
                        🚀 Faire une nouvelle demande
                    </a>

                </div>

            </div>


        @else

            <!-- AUCUNE DEMANDE -->

            <a
                href="{{ route('demande.create') }}"
                class="inline-flex items-center gap-2 text-gray-600 hover:text-blue-600 font-semibold transition"
            >
                🚀 Devenir prestataire
            </a>

        @endif


    @elseif(Auth::user()->role == 'prestataire')

        <!-- PRESTATAIRE ACCEPTÉ -->

        <a
            href="{{ route('prestations.index') }}"
            class="inline-flex items-center gap-2 text-gray-600 hover:text-blue-600 font-semibold transition"
        >
            ➕ Publier une prestation
        </a>

    @endif

</div>



<!-- DELETE -->


<div class="bg-white rounded-3xl shadow p-8 mt-8">





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
