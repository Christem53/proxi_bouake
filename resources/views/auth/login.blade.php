<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-950">

<head>

    <!-- Configuration de la page -->
    <meta charset="UTF-8">

    <!-- Adaptation mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Titre affiché dans le navigateur -->
    <title>Connexion - ProxiBouaké</title>


    <!-- Chargement des fichiers CSS et JS Laravel Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>



<body class="h-full">



<!-- Conteneur principal de la page de connexion -->

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">



    <!-- LOGO ET PRESENTATION -->

    <div class="sm:mx-auto sm:w-full sm:max-w-sm text-center">


        <!-- Logo de l'application -->

        <h1 class="text-4xl font-bold text-blue-500">

            Proxi<span class="text-white">Bouaké</span>

        </h1>



        <!-- Titre de connexion -->

        <h2 class="mt-10 text-2xl font-bold tracking-tight text-white">

            Connectez-vous à votre compte

        </h2>



        <!-- Description -->

        <p class="mt-3 text-gray-400">

            Retrouvez vos services et vos prestataires facilement.

        </p>


    </div>






    <!-- FORMULAIRE DE CONNEXION -->


    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">



        <!-- Envoi des données vers la route login -->

        <form method="POST" action="{{ route('login') }}" class="space-y-6">


            <!-- Protection CSRF Laravel -->

            @csrf





            <!-- AFFICHAGE DES ERREURS DE CONNEXION -->


            @if ($errors->any())

            <div class="rounded-xl bg-red-500/10 border border-red-500/30 p-4">


                @foreach ($errors->all() as $error)


                <p class="text-red-400 text-sm">

                    {{ $error }}

                </p>


                @endforeach


            </div>


            @endif







            <!-- CHAMP EMAIL -->


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

                    value="{{ old('email') }}"

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









            <!-- CHAMP MOT DE PASSE -->


            <div>



                <div class="flex items-center justify-between">



                    <label for="password"

                    class="block text-sm font-medium text-gray-100">


                        Mot de passe


                    </label>





                    <!-- Lien récupération mot de passe -->


                    <a href="{{ route('password.request') }}"

                    class="text-sm font-semibold text-blue-400 hover:text-blue-300">


                        Mot de passe oublié ?


                    </a>



                </div>







                <!-- Conteneur du mot de passe avec bouton oeil -->


                <div class="mt-2 relative">



                    <input


                    id="password"


                    name="password"


                    type="password"


                    required


                    autocomplete="current-password"



                    class="block w-full rounded-xl 
                    bg-white/5 px-4 py-3 pr-12
                    text-white 
                    outline outline-1 
                    outline-white/10
                    placeholder:text-gray-500
                    focus:outline-2 
                    focus:outline-blue-500"



                    placeholder="••••••••">





                    <!-- Bouton afficher/cacher mot de passe -->


                    <button
type="button"
onclick="togglePassword()"
class="absolute right-3 top-3 text-gray-400 hover:text-white"
id="togglePasswordBtn"
>


<!-- Icône oeil visible -->

<svg id="eyeIcon"
xmlns="http://www.w3.org/2000/svg"
fill="none"
viewBox="0 0 24 24"
stroke-width="1.8"
stroke="currentColor"
class="w-6 h-6">

<path 
stroke-linecap="round"
stroke-linejoin="round"
d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12s-3.75 6.75-9.75 6.75S2.25 12 2.25 12z" />


<circle 
cx="12"
cy="12"
r="3" />

</svg>


</button>



                </div>




            </div>










            <!-- BOUTON CONNEXION -->


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









        <!-- LIEN INSCRIPTION -->


        <p class="mt-10 text-center text-sm text-gray-400">


            Vous n'avez pas encore de compte ?



            <a href="{{ route('register') }}"


            class="font-semibold text-blue-400 hover:text-blue-300">



                Créer un compte



            </a>



        </p>





    </div>





</div>









<!-- SCRIPT POUR AFFICHER/CACHER LE MOT DE PASSE -->


<script>


function togglePassword(){


    let password = document.getElementById('password');

    let eyeIcon = document.getElementById('eyeIcon');



    if(password.type === "password"){


        // Afficher le mot de passe

        password.type = "text";


        // Remplacer l'oeil ouvert par oeil barré

        eyeIcon.innerHTML = `

        <path 
        stroke-linecap="round"
        stroke-linejoin="round"
        d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 15.338 7.152 18 12 18c1.38 0 2.693-.24 3.89-.676M6.228 6.228A10.45 10.45 0 0 1 12 4c4.848 0 8.774 2.662 10.066 6-.523 1.353-1.284 2.55-2.228 3.546M6.228 6.228 3 3m3.228 3.228 14.544 14.544" />

        `;


    }

    else{


        // Cacher le mot de passe

        password.type = "password";



        // Remettre l'oeil normal

        eyeIcon.innerHTML = `

        <path 
        stroke-linecap="round"
        stroke-linejoin="round"
        d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12s-3.75 6.75-9.75 6.75S2.25 12 2.25 12z" />

        <circle 
        cx="12"
        cy="12"
        r="3" />

        `;


    }


}



</script>





</body>

</html>