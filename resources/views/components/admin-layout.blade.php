<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin - Proxi Bouaké</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body class="bg-gray-100">


<div class="flex min-h-screen">


    <!-- SIDEBAR -->

    <aside class="w-64 bg-gray-900 text-white">


        <div class="p-6 text-2xl font-bold">
            Proxi<span class="text-blue-400">Bouaké</span>
        </div>



        <nav class="space-y-2">


            <a href="{{ route('admin.dashboard') }}"
            class="block px-6 py-3 hover:bg-gray-800">

                🏠 Dashboard

            </a>



            <a href="{{ route('categories.index') }}"
            class="block px-6 py-3 hover:bg-gray-800">

                📂 Catégories

            </a>



            <a href="{{ route('users.index') }}"
            class="block px-6 py-3 hover:bg-gray-800">

                👥 Utilisateurs

            </a>



            <a href="{{ route('prestataires.index') }}"
            class="block px-6 py-3 hover:bg-gray-800">

                🛠 Prestataires

            </a>



            <a href="#"
            class="block px-6 py-3 hover:bg-gray-800">

                📋 Demandes

            </a>


        </nav>


    </aside>





    <!-- CONTENU -->


    <div class="flex-1">


        <!-- HEADER -->

        <header class="bg-white shadow p-5 flex justify-between items-center">


            <h1 class="text-xl font-bold">
                Tableau de bord
            </h1>



            <div class="flex items-center gap-5">


                <span class="font-semibold">
                    {{ Auth::user()->name }}
                </span>



                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button class="text-red-600 hover:text-red-800">

                        Déconnexion

                    </button>

                </form>


            </div>


        </header>





        <main class="p-8">

            {{ $slot }}

        </main>



    </div>


</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>

const ctx = document.getElementById('performanceChart');


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

</script>
</body>
</html>