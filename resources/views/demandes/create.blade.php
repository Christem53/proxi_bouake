<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle demande - Proxi Bouaké</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<!-- NAVBAR -->

<nav class="bg-white shadow">

    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <h1 class="text-2xl font-bold text-blue-600">
            Proxi<span class="text-gray-900">Bouaké</span>
        </h1>

        <div class="flex items-center gap-6">

            <a href="{{ route('dashboard') }}"
               class="text-gray-600 hover:text-blue-600">
                Accueil
            </a>

            <div class="relative">

                <button onclick="toggleMenu()"
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

                    <form method="POST"
                          action="{{ route('logout') }}">
                        @csrf

                        <button class="w-full text-left px-5 py-3 text-red-600 hover:bg-gray-100">
                            🚪 Déconnexion
                        </button>
                    </form>

                </div>

            </div>

        </div>

    </div>

</nav>


<!-- CONTENU -->

<div class="max-w-5xl mx-auto py-12 px-6">

    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

        <!-- En-tête -->

        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-8 text-white">

            <h2 class="text-3xl font-bold">
                Envoyer une demande
            </h2>

            <p class="mt-2 text-blue-100">
                Décrivez votre besoin afin que le prestataire puisse vous répondre.
            </p>

        </div>

        <div class="p-8">

            <!-- Informations prestation -->

            <div class="border rounded-2xl p-6 bg-gray-50">

                <h3 class="text-2xl font-bold text-gray-800">
                    {{ $prestation->titre }}
                </h3>

                <p class="mt-3 text-gray-600">
                    {{ $prestation->description }}
                </p>

                <div class="grid md:grid-cols-2 gap-5 mt-6">

                    <div>
                        <span class="font-semibold">🏢 Prestataire</span>

                        <p>
                            {{ $prestataire->nom_entreprise ?? $prestataire->user->name }}
                        </p>
                    </div>

                    <div>
                        <span class="font-semibold">💰 Prix</span>

                        <p class="text-blue-600 font-bold">
                            {{ number_format($prestation->prix,0,' ',' ') }} FCFA
                        </p>
                    </div>

                    <div>
                        <span class="font-semibold">📍 Ville</span>

                        <p>{{ $prestataire->ville }}</p>
                    </div>

                    <div>
                        <span class="font-semibold">🏘 Quartier</span>

                        <p>{{ $prestataire->quartier }}</p>
                    </div>

                </div>

            </div>


            <form method="POST"
                  action="{{ route('demandes.store') }}"
                  class="mt-8">

                @csrf

                <input type="hidden"
                       name="prestation_id"
                       value="{{ $prestation->id }}">

                <input type="hidden"
                       name="prestataire_id"
                       value="{{ $prestataire->id }}">

                <div>

                    <label class="font-semibold text-lg">
                        Votre message
                    </label>

                    <textarea
                        name="message"
                        rows="7"
                        required
                        class="mt-3 w-full rounded-2xl border-gray-300 focus:border-blue-600 focus:ring-blue-600"
                        placeholder="Décrivez précisément votre besoin..."></textarea>

                </div>

                <div class="flex gap-4 mt-8">

                    <a href="{{ url()->previous() }}"
                       class="flex-1 bg-gray-200 text-center py-3 rounded-xl hover:bg-gray-300">
                        Annuler
                    </a>

                    <button
                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold">
                        Envoyer la demande
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<x-footer />

<script>

function toggleMenu(){

    document.getElementById('userMenu').classList.toggle('hidden');

}

</script>

</body>
</html>