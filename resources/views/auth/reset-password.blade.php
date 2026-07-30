<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-950">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nouveau mot de passe - ProxiBouaké</title>


    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>



<body class="h-full">



<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">



    <!-- LOGO ET PRESENTATION -->

    <div class="sm:mx-auto sm:w-full sm:max-w-sm text-center">


        <h1 class="text-4xl font-bold text-blue-500">

            Proxi<span class="text-white">Bouaké</span>

        </h1>



        <h2 class="mt-10 text-2xl font-bold tracking-tight text-white">

            Créer un nouveau mot de passe

        </h2>



        <p class="mt-3 text-gray-400">

            Choisissez un nouveau mot de passe sécurisé pour votre compte.

        </p>


    </div>







    <!-- FORMULAIRE -->

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">



        <form method="POST" action="{{ route('password.store') }}" class="space-y-6">


            @csrf


            <!-- TOKEN CACHE -->

            <input type="hidden" 
            name="token" 
            value="{{ $request->route('token') }}">





            <!-- ERREURS -->

            @if ($errors->any())

            <div class="rounded-xl bg-red-500/10 border border-red-500/30 p-4">


                @foreach ($errors->all() as $error)

                    <p class="text-red-400 text-sm">

                        {{ $error }}

                    </p>

                @endforeach


            </div>

            @endif






            <!-- EMAIL -->


            <div>


                <label class="block text-sm font-medium text-gray-100">

                    Adresse email

                </label>


                <input

                id="email"

                type="email"

                name="email"

                value="{{ old('email', $request->email) }}"

                required

                autofocus


                class="mt-2 block w-full rounded-xl 
                bg-white/5 px-4 py-3 
                text-white
                outline outline-1 
                outline-white/10
                focus:outline-2
                focus:outline-blue-500"


                >


            </div>







            <!-- NOUVEAU MOT DE PASSE -->


            <div>


                <label class="block text-sm font-medium text-gray-100">

                    Nouveau mot de passe

                </label>



                <div class="mt-2 relative">


                    <input

                    id="password"

                    type="password"

                    name="password"

                    required


                    class="block w-full rounded-xl 
                    bg-white/5 px-4 py-3 pr-12
                    text-white
                    outline outline-1 
                    outline-white/10
                    focus:outline-2
                    focus:outline-blue-500"


                    placeholder="••••••••"



                    >



                    <button

                    type="button"

                    onclick="togglePassword('password','eye1')"

                    class="absolute right-3 top-3 text-gray-400 hover:text-white"


                    >


                    👁️


                    </button>


                </div>



            </div>







            <!-- CONFIRMATION -->


            <div>


                <label class="block text-sm font-medium text-gray-100">

                    Confirmer le mot de passe

                </label>



                <div class="mt-2 relative">


                    <input

                    id="password_confirmation"

                    type="password"

                    name="password_confirmation"

                    required


                    class="block w-full rounded-xl 
                    bg-white/5 px-4 py-3 pr-12
                    text-white
                    outline outline-1 
                    outline-white/10
                    focus:outline-2
                    focus:outline-blue-500"


                    placeholder="••••••••"



                    >



                    <button

                    type="button"

                    onclick="togglePassword('password_confirmation','eye2')"

                    class="absolute right-3 top-3 text-gray-400 hover:text-white"


                    >


                    👁️


                    </button>


                </div>


            </div>







            <!-- BOUTON -->


            <div>


                <button

                type="submit"

                class="flex w-full justify-center rounded-xl
                bg-blue-600 px-4 py-3
                text-sm font-semibold text-white
                hover:bg-blue-500 transition">


                    Réinitialiser le mot de passe


                </button>


            </div>




        </form>



    </div>



</div>







<script>


function togglePassword(id, icon){


    let input = document.getElementById(id);



    if(input.type === "password"){


        input.type = "text";


    }else{


        input.type = "password";


    }


}


</script>



</body>

</html>