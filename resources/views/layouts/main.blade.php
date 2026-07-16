<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title') - Proxi Bouaké
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="bg-gray-50 text-gray-900">


    <!-- Navbar -->
    <header class="w-full bg-white shadow-sm">

        <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">


            <!-- Logo -->
            <a href="/" class="text-2xl font-bold">

                <span class="text-blue-900">
                    Proxi
                </span>

                <span class="text-orange-500">
                    Bouaké
                </span>

            </a>



            <!-- Menu -->

            <nav class="flex items-center gap-8">

                <a href="/" 
                   class="text-gray-700 hover:text-orange-500">
                    Accueil
                </a>


                <a href="#services"
                   class="text-gray-700 hover:text-orange-500">
                    Services
                </a>


                <a href="/login"
                   class="text-gray-700 hover:text-orange-500">
                    Connexion
                </a>


                <a href="/register"
                   class="bg-orange-500 text-white px-5 py-2 rounded-full hover:bg-orange-600">

                    Inscription

                </a>


            </nav>


        </div>

    </header>



    <!-- Contenu des pages -->

    <main>

        @yield('content')

    </main>



    <!-- Footer -->

    <footer class="bg-gray-900 text-white mt-20">

        <div class="max-w-7xl mx-auto px-6 py-8 text-center">

            <h3 class="text-xl font-bold">
                Proxi Bouaké
            </h3>


            <p class="text-gray-400 mt-2">
                Trouvez facilement les services près de chez vous.
            </p>


            <p class="mt-5 text-sm">
                © {{ date('Y') }} Proxi Bouaké
            </p>

        </div>

    </footer>


</body>

</html>