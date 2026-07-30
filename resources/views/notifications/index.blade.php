<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Notifications - Proxi Bouaké</title>


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


            <a href="{{ route('dashboard') }}"
            class="text-gray-600 hover:text-blue-600">

                Accueil

            </a>



            <a href="{{ route('notifications.index') }}"
            class="text-blue-600 font-semibold">

                🔔 Notifications

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
                            Prestataire
                        </p>

                    </div>



                    <svg class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 9l-7 7-7-7"/>

                    </svg>


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


<div class="max-w-4xl mx-auto py-10 px-6">


    <div class="bg-white rounded-2xl shadow-lg p-8">



        <div class="flex items-center justify-between mb-6">


            <h1 class="text-3xl font-bold text-gray-800">

                🔔 Mes notifications

            </h1>



            <span class="text-sm text-gray-500">

                {{ $notifications->count() }} notification(s)

            </span>


        </div>





        @forelse($notifications as $notification)



            <div class="border border-gray-200 rounded-xl p-5 mb-4 hover:shadow-md transition">


                <div class="flex items-start gap-4">



                    <div class="bg-blue-100 text-blue-600 rounded-full p-3 text-xl">

                        🔔

                    </div>




                    <div class="flex-1">


                        <p class="text-gray-800 font-medium text-lg">

                            {{ $notification->message }}

                        </p>



                        <p class="text-sm text-gray-500 mt-2">

                            {{ $notification->created_at->diffForHumans() }}

                        </p>


                    </div>


                </div>


            </div>



        @empty



            <div class="text-center py-10">


                <div class="text-5xl mb-3">

                    🔕

                </div>



                <p class="text-gray-500">

                    Vous n'avez aucune notification pour le moment.

                </p>


            </div>



        @endforelse




    </div>


</div>





<script>

function toggleMenu(){

    let menu = document.getElementById('userMenu');

    menu.classList.toggle('hidden');

}

</script>


</body>

</html>