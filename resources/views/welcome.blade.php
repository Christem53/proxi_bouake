<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proxi Bouaké</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <!-- Navigation -->
    <nav class="bg-blue-900 text-white px-8 py-4 flex justify-between items-center">

        <div class="text-2xl font-bold">
            Proxi <span class="text-orange-400">Bouaké</span>
        </div>

        <div class="space-x-6">
            <a href="#" class="hover:text-orange-400">
                Accueil
            </a>

            <a href="#" class="hover:text-orange-400">
                Services
            </a>

            <a href="/login" class="hover:text-orange-400">
                Connexion
            </a>

            <a href="/register" 
               class="bg-orange-500 px-4 py-2 rounded-lg hover:bg-orange-600">
                Inscription
            </a>
        </div>

    </nav>


    <!-- Hero Section -->
    <section class="bg-white py-20">

        <div class="max-w-6xl mx-auto px-6 text-center">

            <h1 class="text-5xl font-bold text-blue-900 mb-6">
                Trouvez facilement un professionnel à Bouaké
            </h1>


            <p class="text-gray-600 text-xl mb-8">
                Plombiers, électriciens, informaticiens,
                coiffeurs et plusieurs autres services près de chez vous.
            </p>


            <div class="flex justify-center">

                <input 
                type="text"
                placeholder="Rechercher un service..."
                class="w-96 px-5 py-3 border rounded-l-lg">


                <button 
                class="bg-orange-500 text-white px-6 rounded-r-lg">
                    Rechercher
                </button>

            </div>

        </div>

    </section>



    <!-- Catégories -->
    <section class="py-16">

        <div class="max-w-6xl mx-auto px-6">

            <h2 class="text-3xl font-bold text-center text-blue-900 mb-10">
                Nos services
            </h2>


            <div class="grid md:grid-cols-3 gap-8">


                <div class="bg-white p-6 rounded-xl shadow">
                    <h3 class="text-xl font-bold">
                        🛠 Plomberie
                    </h3>
                    <p class="text-gray-600 mt-2">
                        Trouvez un plombier rapidement.
                    </p>
                </div>


                <div class="bg-white p-6 rounded-xl shadow">
                    <h3 class="text-xl font-bold">
                        ⚡ Électricité
                    </h3>
                    <p class="text-gray-600 mt-2">
                        Des professionnels qualifiés.
                    </p>
                </div>


                <div class="bg-white p-6 rounded-xl shadow">
                    <h3 class="text-xl font-bold">
                        💻 Informatique
                    </h3>
                    <p class="text-gray-600 mt-2">
                        Dépannage et services numériques.
                    </p>
                </div>


            </div>

        </div>

    </section>



    <!-- Professionnels -->
    <section class="bg-blue-900 text-white py-16">

        <div class="max-w-5xl mx-auto text-center">

            <h2 class="text-3xl font-bold mb-5">
                Vous proposez un service ?
            </h2>


            <p class="mb-8 text-lg">
                Inscrivez-vous gratuitement et faites découvrir votre activité.
            </p>


            <a href="/register"
            class="bg-orange-500 px-8 py-3 rounded-lg">
                Créer mon profil
            </a>

        </div>

    </section>


    <!-- Footer -->
    <footer class="bg-gray-900 text-white text-center py-5">

        © {{ date('Y') }} Proxi Bouaké - Tous droits réservés

    </footer>


</body>
</html>