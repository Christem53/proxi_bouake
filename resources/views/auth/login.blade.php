<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-950">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Connexion - ProxiBouaké</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="h-full">


<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">


    <!-- LOGO -->

    <div class="sm:mx-auto sm:w-full sm:max-w-sm text-center">


        <h1 class="text-4xl font-bold text-blue-500">
            Proxi<span class="text-white">Bouaké</span>
        </h1>


        <h2 class="mt-10 text-2xl font-bold tracking-tight text-white">
            Connectez-vous à votre compte
        </h2>


        <p class="mt-3 text-gray-400">
            Retrouvez vos services et vos prestataires facilement.
        </p>


    </div>





    <!-- FORMULAIRE -->

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">


        <form method="POST" action="{{ route('login') }}" class="space-y-6">

            @csrf


            <!-- EMAIL -->

            <div>

                <label for="email" 
                class="block text-sm font-medium text-gray-100">
                    Adresse email
                </label>


                <div class="mt-2">

                    <input 
                    id="email"
                    name="email"
                    type="email"
                    required
                    autofocus
                    autocomplete="email"

                    class="block w-full rounded-xl 
                    bg-white/5 px-4 py-3 
                    text-white 
                    outline outline-1 
                    outline-white/10
                    placeholder:text-gray-500
                    focus:outline-2 
                    focus:outline-blue-500"

                    placeholder="exemple@gmail.com">

                </div>


            </div>





            <!-- PASSWORD -->


            <div>


                <div class="flex items-center justify-between">


                    <label for="password"
                    class="block text-sm font-medium text-gray-100">

                        Mot de passe

                    </label>



                    <a href="{{ route('password.request') }}"
                    class="text-sm font-semibold text-blue-400 hover:text-blue-300">

                        Mot de passe oublié ?

                    </a>


                </div>




                <div class="mt-2">


                    <input

                    id="password"
                    name="password"
                    type="password"
                    required
                    autocomplete="current-password"

                    class="block w-full rounded-xl 
                    bg-white/5 px-4 py-3 
                    text-white 
                    outline outline-1 
                    outline-white/10
                    placeholder:text-gray-500
                    focus:outline-2 
                    focus:outline-blue-500"

                    placeholder="••••••••">


                </div>


            </div>






            <!-- BUTTON -->


            <div>


                <button 
                type="submit"

                class="flex w-full justify-center 
                rounded-xl 
                bg-blue-600 
                px-4 py-3 
                text-sm font-semibold 
                text-white
                hover:bg-blue-500
                transition">


                    Se connecter


                </button>


            </div>



        </form>





        <!-- INSCRIPTION -->


        <p class="mt-10 text-center text-sm text-gray-400">


            Vous n'avez pas encore de compte ?


            <a href="{{ route('register') }}"
            class="font-semibold text-blue-400 hover:text-blue-300">


                Créer un compte


            </a>


        </p>



    </div>



</div>


</body>

</html>