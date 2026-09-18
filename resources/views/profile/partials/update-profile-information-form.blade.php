<section class="space-y-8">

    <!-- EN-TÊTE -->
    <header>
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
            👤 Informations personnelles
        </h2>

        <p class="mt-2 text-gray-600 dark:text-gray-400">
            Mettez à jour vos informations afin de faciliter vos échanges avec les prestataires ProxiBouaké.
        </p>
    </header>


    <!-- FORMULAIRE DE VÉRIFICATION EMAIL -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>


    <!-- FORMULAIRE DU PROFIL -->
    <form
        method="post"
        action="{{ route('profile.update') }}"
        enctype="multipart/form-data"
        class="mt-8 space-y-6"
    >

        @csrf
        @method('patch')


        <div class="grid md:grid-cols-2 gap-6">


            <!-- NOM COMPLET -->
            <div>
                <label
                    for="name"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                >
                    Nom complet
                </label>

                <input
                    id="name"
                    name="name"
                    type="text"
                    value="{{ old('name', $user->name) }}"
                    required
                    autocomplete="name"
                    class="mt-2 w-full rounded-xl border-gray-300 px-4 py-3
                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                >

                <x-input-error
                    class="mt-2"
                    :messages="$errors->get('name')"
                />
            </div>


            <!-- EMAIL -->
            <div>
                <label
                    for="email"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                >
                    Email
                </label>

                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email', $user->email) }}"
                    required
                    autocomplete="username"
                    class="mt-2 w-full rounded-xl border-gray-300 px-4 py-3
                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                >

                <x-input-error
                    class="mt-2"
                    :messages="$errors->get('email')"
                />
            </div>


            <!-- TÉLÉPHONE -->
            <div>
                <label
                    for="phone"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                >
                    Téléphone
                </label>

                <input
                    id="phone"
                    name="phone"
                    type="text"
                    value="{{ old('phone', $user->phone) }}"
                    placeholder="Ex : 0700000000"
                    autocomplete="tel"
                    class="mt-2 w-full rounded-xl border-gray-300 px-4 py-3
                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                >

                <x-input-error
                    class="mt-2"
                    :messages="$errors->get('phone')"
                />
            </div>


            <!-- VILLE -->
            <div>
                <label
                    for="ville"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                >
                    Ville
                </label>

                <input
                    id="ville"
                    name="ville"
                    type="text"
                    value="{{ old('ville', $user->ville) }}"
                    placeholder="Ex : Bouaké"
                    autocomplete="address-level2"
                    class="mt-2 w-full rounded-xl border-gray-300 px-4 py-3
                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                >

                <x-input-error
                    class="mt-2"
                    :messages="$errors->get('ville')"
                />
            </div>


            <!-- QUARTIER -->
            <div>
                <label
                    for="quartier"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                >
                    Quartier
                </label>

                <input
                    id="quartier"
                    name="quartier"
                    type="text"
                    value="{{ old('quartier', $user->quartier) }}"
                    placeholder="Ex : N'Dakro"
                    autocomplete="address-line2"
                    class="mt-2 w-full rounded-xl border-gray-300 px-4 py-3
                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                >

                <x-input-error
                    class="mt-2"
                    :messages="$errors->get('quartier')"
                />
            </div>


            <!-- PHOTO -->
            <div>

                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Photo de profil
                </label>


                <!-- APERÇU DE LA PHOTO -->
                <div class="mt-3 flex flex-col items-center md:items-start">

                    <label
                        for="photo"
                        class="relative w-32 h-32 rounded-full overflow-hidden
                               border-4 border-gray-200
                               hover:border-blue-500
                               cursor-pointer
                               transition duration-200
                               group"
                    >

                        @if($user->photo)

                            <!-- PHOTO EXISTANTE -->
                            <img
                                id="photoPreview"
                                src="{{ asset('storage/' . $user->photo) }}"
                                alt="Photo de profil"
                                class="w-full h-full object-cover"
                            >

                        @else

                            <!-- PHOTO PAR DÉFAUT -->
                            <div
                                id="photoPlaceholder"
                                class="w-full h-full bg-gray-100
                                       flex items-center justify-center
                                       text-gray-400 text-4xl"
                            >
                                📷
                            </div>

                            <!-- APERÇU NOUVELLE PHOTO -->
                            <img
                                id="photoPreview"
                                src=""
                                alt="Aperçu de la photo"
                                class="hidden w-full h-full object-cover"
                            >

                        @endif


                        <!-- PETIT EFFET AU SURVOL -->
                        <div
                            class="absolute inset-0
                                   bg-black/40
                                   opacity-0
                                   group-hover:opacity-100
                                   flex items-center justify-center
                                   text-white text-sm font-semibold
                                   transition duration-200"
                        >
                            📷 Modifier
                        </div>

                    </label>


                    <!-- BOUTON CHANGER L'IMAGE -->
                    <label
                        for="photo"
                        class="mt-3 inline-flex items-center gap-2
                               px-4 py-2
                               bg-blue-600 text-white
                               rounded-lg
                               text-sm font-semibold
                               cursor-pointer
                               hover:bg-blue-700
                               transition duration-200"
                    >
                        📷 Changer l'image
                    </label>


                    <!-- INPUT FICHIER CACHÉ -->
                    <input
                        id="photo"
                        name="photo"
                        type="file"
                        accept="image/jpeg,image/png,image/webp"
                        class="hidden"
                    >


                    <p class="mt-2 text-xs text-gray-500">
                        JPG, JPEG, PNG ou WEBP.
                    </p>


                    <x-input-error
                        class="mt-2"
                        :messages="$errors->get('photo')"
                    />

                </div>

            </div>

        </div>


        <!-- VÉRIFICATION EMAIL -->
        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

            <div class="mt-4 rounded-xl border border-yellow-200 bg-yellow-50 p-4">

                <p class="text-sm text-yellow-700">

                    Votre adresse email n'est pas encore vérifiée.

                    <button
                        form="send-verification"
                        class="ml-1 font-semibold underline hover:text-yellow-900"
                    >
                        Renvoyer le mail de vérification
                    </button>

                </p>


                @if (session('status') === 'verification-link-sent')

                    <p class="mt-2 text-sm font-medium text-green-600">
                        ✓ Un nouveau lien de vérification a été envoyé.
                    </p>

                @endif

            </div>

        @endif


        <!-- BOUTON ENREGISTRER -->
        <div class="flex flex-wrap items-center gap-5">

            <button
                type="submit"
                class="inline-flex items-center gap-2 rounded-xl bg-blue-600
                       px-8 py-3 font-semibold text-white
                       transition hover:bg-blue-700
                       focus:outline-none focus:ring-2
                       focus:ring-blue-500 focus:ring-offset-2"
            >
                💾 Enregistrer les modifications
            </button>


            @if (session('status') === 'profile-updated')

                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="font-medium text-green-600"
                >
                    ✓ Profil mis à jour
                </p>

            @endif

        </div>

    </form>


    <!-- SCRIPT APERÇU PHOTO -->
    <script>

        const photoInput = document.getElementById('photo');
        const photoPreview = document.getElementById('photoPreview');
        const photoPlaceholder = document.getElementById('photoPlaceholder');

        photoInput.addEventListener('change', function(event) {

            const file = event.target.files[0];

            // Vérifier qu'une photo a été sélectionnée
            if (!file) {
                return;
            }

            // Vérifier que le fichier est bien une image
            if (!file.type.startsWith('image/')) {
                return;
            }

            // Créer une URL temporaire pour afficher la photo
            const imageUrl = URL.createObjectURL(file);

            // Afficher la nouvelle photo
            photoPreview.src = imageUrl;
            photoPreview.classList.remove('hidden');

            // Cacher l'image par défaut
            if (photoPlaceholder) {
                photoPlaceholder.classList.add('hidden');
            }

        });

    </script>

</section>
