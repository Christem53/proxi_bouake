<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-950">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inscription - ProxiBouaké</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="h-full">


<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">


    <!-- LOGO -->

    <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">


        <h1 class="text-4xl font-bold text-blue-500">
            Proxi<span class="text-white">Bouaké</span>
        </h1>


        <h2 class="mt-8 text-2xl font-bold text-white">
            Créer votre compte
        </h2>


        <p class="mt-3 text-gray-400">
            Rejoignez la plateforme de services de proximité à Bouaké.
        </p>


    </div>





    <!-- FORMULAIRE -->


    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">


        <form method="POST" action="{{ route('register') }}" class="space-y-5">


            @csrf




            <!-- NOM -->


            <div>

                <label class="block text-sm font-medium text-gray-100">
                    Nom complet
                </label>


                <input

                type="text"
                name="name"
                value="{{ old('name') }}"
                required

                placeholder="Votre nom"

                class="mt-2 block w-full rounded-xl
                bg-white/5 px-4 py-3
                text-white
                outline outline-1
                outline-white/10
                focus:outline-blue-500">


            </div>





            <!-- EMAIL -->


            <div>

                <label class="block text-sm font-medium text-gray-100">
                    Adresse email
                </label>


                <input

                type="email"
                name="email"
                value="{{ old('email') }}"
                required

                placeholder="exemple@gmail.com"

                class="mt-2 block w-full rounded-xl
                bg-white/5 px-4 py-3
                text-white
                outline outline-1
                outline-white/10
                focus:outline-blue-500">


            </div>





            <!-- TELEPHONE -->


            <div>

                <label class="block text-sm font-medium text-gray-100">
                    Téléphone
                </label>


                <input

                type="text"
                name="phone"
                value="{{ old('phone') }}"
                required

                placeholder="07 XX XX XX XX"

                class="mt-2 block w-full rounded-xl
                bg-white/5 px-4 py-3
                text-white
                outline outline-1
                outline-white/10
                focus:outline-blue-500">


            </div>





            <!-- VILLE + QUARTIER -->


            <div class="grid grid-cols-2 gap-4">


                <div>

                    <label class="block text-sm font-medium text-gray-100">
                        Ville
                    </label>


                    <input

                    type="text"
                    name="ville"
                    value="{{ old('ville') }}"
                    required

                    placeholder="Bouaké"

                    class="mt-2 block w-full rounded-xl
                    bg-white/5 px-4 py-3
                    text-white
                    outline outline-1
                    outline-white/10
                    focus:outline-blue-500">


                </div>



                <div>


                    <label class="block text-sm font-medium text-gray-100">
                        Quartier
                    </label>


                    <input

                    type="text"
                    name="quartier"
                    value="{{ old('quartier') }}"
                    required

                    placeholder="N'Dakro"

                    class="mt-2 block w-full rounded-xl
                    bg-white/5 px-4 py-3
                    text-white
                    outline outline-1
                    outline-white/10
                    focus:outline-blue-500">


                </div>


            </div>






            <!-- MOT DE PASSE -->


            <div>


                <label class="block text-sm font-medium text-gray-100">
                    Mot de passe
                </label>


                <input

                type="password"
                name="password"
                required

                placeholder="••••••••"

                class="mt-2 block w-full rounded-xl
                bg-white/5 px-4 py-3
                text-white
                outline outline-1
                outline-white/10
                focus:outline-blue-500">


            </div>





            <!-- CONFIRMATION -->


            <div>


                <label class="block text-sm font-medium text-gray-100">
                    Confirmer le mot de passe
                </label>


                <input

                type="password"
                name="password_confirmation"
                required

                placeholder="••••••••"

                class="mt-2 block w-full rounded-xl
                bg-white/5 px-4 py-3
                text-white
                outline outline-1
                outline-white/10
                focus:outline-blue-500">


            </div>





            <!-- BOUTON -->


            <button

            type="submit"

            class="w-full rounded-xl
            bg-blue-600
            py-3
            font-semibold
            text-white
            hover:bg-blue-500
            transition">


                Créer mon compte


            </button>



        </form>





        <p class="mt-8 text-center text-sm text-gray-400">


            Vous avez déjà un compte ?


            <a href="{{ route('login') }}"
            class="font-semibold text-blue-400 hover:text-blue-300">

                Se connecter

            </a>


        </p>



    </div>


</div>


</body>

</html>