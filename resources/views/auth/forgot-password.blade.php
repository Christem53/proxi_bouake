```blade
<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-950">

<head>

    <!-- Configuration de la page -->
    <meta charset="UTF-8">

    <!-- Adaptation mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Titre -->
    <title>Mot de passe oublié - ProxiBouaké</title>

    <!-- CSS / JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="h-full">


<!-- CONTENEUR PRINCIPAL -->

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">


    <!-- LOGO -->

    <div class="sm:mx-auto sm:w-full sm:max-w-sm text-center">

        <h1 class="text-4xl font-bold text-blue-500">
            Proxi<span class="text-white">Bouaké</span>
        </h1>

        <h2 class="mt-10 text-2xl font-bold tracking-tight text-white">
            Mot de passe oublié
        </h2>

        <p class="mt-3 text-gray-400">

            Entrez votre adresse e-mail. Nous vous enverrons un lien sécurisé
            pour réinitialiser votre mot de passe.

        </p>

    </div>





    <!-- FORMULAIRE -->

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">


        <!-- Message de succès -->

        @if (session('status'))
    <div class="mb-6 rounded-xl border border-green-500/30 bg-green-500/10 p-4 text-green-400">
        Un lien de réinitialisation de votre mot de passe a été envoyé à votre adresse e-mail.
    </div>
@endif


        <!-- Formulaire -->

        <form
            method="POST"
            action="{{ route('password.email') }}"
            class="space-y-6">

            @csrf



            <!-- Champ Email -->

            <div>

                <label
                    for="email"
                    class="block text-sm font-medium text-gray-100">

                    Adresse e-mail

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

                        placeholder="exemple@gmail.com"

                        class="block w-full rounded-xl
                               bg-white/5
                               px-4 py-3
                               text-white
                               outline outline-1 outline-white/10
                               placeholder:text-gray-500
                               focus:outline-2
                               focus:outline-blue-500">

                </div>

                @error('email')

                    <p class="mt-2 text-sm text-red-400">
                        {{ $message }}
                    </p>

                @enderror

            </div>





            <!-- Bouton -->

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

                    📩 Envoyer le lien de réinitialisation

                </button>

            </div>

        </form>





        <!-- Retour connexion -->

        <p class="mt-10 text-center text-sm text-gray-400">

            Vous vous souvenez de votre mot de passe ?

            <a
                href="{{ route('login') }}"
                class="font-semibold text-blue-400 hover:text-blue-300">

                Se connecter

            </a>

        </p>


    </div>


</div>

</body>

</html>
```
