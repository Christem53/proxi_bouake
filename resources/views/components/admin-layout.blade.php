<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin - Proxi Bouaké</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

@php

use App\Models\Prestataire;
use App\Models\Prestation;

/*
|--------------------------------------------------------------------------
| Notifications du menu Administrateur
|--------------------------------------------------------------------------
|
| Ces compteurs permettent d'afficher un badge rouge sur les menus
| lorsque de nouvelles actions nécessitent l'intervention de l'admin.
|
*/

// Nombre de demandes pour devenir prestataire
$nbDemandesPrestataires = Prestataire::where('statut', 'en_attente')->count();

// Nombre de prestations en attente de validation
$nbPrestationsEnAttente = Prestation::where('statut', 'en_attente')->count();

@endphp


<div class="flex min-h-screen">

    <!-- ================= SIDEBAR ================= -->

    <aside class="w-64 bg-gray-900 text-white">

        <!-- Logo -->
        <div class="p-6 text-2xl font-bold">
            Proxi<span class="text-blue-400">Bouaké</span>
        </div>

        <!-- Menu -->
        <nav class="space-y-2">

            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
               class="block px-6 py-3 hover:bg-gray-800">

                🏠 Dashboard

            </a>

            <!-- Catégories -->
            <a href="{{ route('categories.index') }}"
               class="block px-6 py-3 hover:bg-gray-800">

                📂 Catégories

            </a>

            <!-- Utilisateurs -->
            <a href="{{ route('users.index') }}"
               class="block px-6 py-3 hover:bg-gray-800">

                👥 Utilisateurs

            </a>

            <!-- Demandes de prestataires -->
            <a href="{{ route('prestataires.index') }}"
               class="flex items-center justify-between px-6 py-3 hover:bg-gray-800">

                <span>🛠 Prestataires</span>

                @if($nbDemandesPrestataires > 0)

                    <span class="min-w-6 h-6 flex items-center justify-center bg-red-600 text-white text-xs font-bold rounded-full shadow">
                        {{ $nbDemandesPrestataires }}
                    </span>

                @endif

            </a>

            <!-- Prestations en attente -->
            <a href="{{ route('admin.prestations.index') }}"
               class="flex items-center justify-between px-6 py-3 hover:bg-gray-800">

                <span>📋 Prestations</span>

                @if($nbPrestationsEnAttente > 0)

                    <span class="min-w-6 h-6 flex items-center justify-center bg-red-600 text-white text-xs font-bold rounded-full shadow">
                        {{ $nbPrestationsEnAttente }}
                    </span>

                @endif

            </a>

        </nav>

    </aside>



    <!-- ================= CONTENU ================= -->

    <div class="flex-1">

        <!-- HEADER -->
        <header class="bg-white shadow p-5 flex justify-between items-center">

            <h1 class="text-xl font-bold">
                Tableau de bord
            </h1>

            <div class="flex items-center gap-5">

                @auth
                    <span class="font-semibold">
                        {{ Auth::user()->name }}
                    </span>
                @endauth

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button class="text-red-600 hover:text-red-800">
                        Déconnexion
                    </button>

                </form>

            </div>

        </header>

        <!-- Contenu des pages -->
        <main class="p-8">

            {{ $slot }}

        </main>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('performanceChart');

if (ctx) {

    new Chart(ctx, {

        type: 'line',

        data: {

            labels: [
                'Jan',
                'Fév',
                'Mars',
                'Avr',
                'Mai',
                'Juin'
            ],

            datasets: [

                {

                    label: 'Demandes de services',

                    data: [
                        10,
                        25,
                        18,
                        40,
                        55,
                        80
                    ],

                    borderWidth: 3,

                    tension: 0.4

                },

                {

                    label: 'Nouveaux utilisateurs',

                    data: [
                        5,
                        15,
                        30,
                        35,
                        60,
                        75
                    ],

                    borderWidth: 3,

                    tension: 0.4

                }

            ]

        },

        options: {

            responsive: true,

            plugins: {

                legend: {

                    position: 'top'

                }

            }

        }

    });

}

</script>

</body>
</html>