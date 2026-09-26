<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Devenir prestataire - ProxiBouaké</title>

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


<a href="/dashboard"
class="text-gray-600 hover:text-blue-600">

Accueil

</a>


<a href="#"
class="text-gray-600 hover:text-blue-600">

Mes demandes

</a>




<!-- PROFIL DROPDOWN -->

<div class="relative">


<button
onclick="toggleMenu()"
class="flex items-center gap-3">


<div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold">

{{ strtoupper(substr(Auth::user()->name,0,1)) }}

</div>



<div class="text-left">

<p class="font-semibold">

{{ Auth::user()->name }}

</p>


<p class="text-sm text-gray-500">


@if(Auth::user()->role == 'admin')

Administrateur

@elseif(Auth::user()->role == 'prestataire')

Prestataire

@else

Client

@endif


</p>


</div>


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


<div class="max-w-6xl mx-auto px-6 py-10">



<div class="mb-8">

<h2 class="text-3xl font-bold">

🚀 Devenir prestataire

</h2>


<p class="text-gray-600 mt-2">

Présentez votre activité et proposez vos services aux habitants de Bouaké.

</p>


</div>





<div class="bg-white rounded-3xl shadow p-8">



<form action="{{ route('prestataire.store') }}" method="POST" enctype="multipart/form-data">

@csrf




<!-- Catégorie -->

<div class="mb-6">

<label class="block font-semibold mb-2">
Catégorie de service
</label>


<select name="category_id"
class="w-full rounded-xl border-gray-300 px-4 py-3">


<option value="">
Choisir une catégorie
</option>


@foreach($categories as $category)

<option value="{{ $category->id }}">

{{ $category->icon }} {{ $category->name }}

</option>

@endforeach


</select>


@error('category_id')

<p class="text-red-600 text-sm mt-2">

{{ $message }}

</p>

@enderror


</div>





<!-- Nom entreprise -->


<div class="mb-6">

<label class="block font-semibold mb-2">

Nom de l'entreprise (facultatif)

</label>


<input
type="text"
name="nom_entreprise"
value="{{ old('nom_entreprise') }}"
placeholder="Ex: Emmanuel Informatique"
class="w-full rounded-xl border-gray-300 px-4 py-3">


</div>





<!-- Description -->


<div class="mb-6">


<label class="block font-semibold mb-2">

Description de votre service

</label>


<textarea
name="description"
rows="5"
placeholder="Présentez votre activité..."
class="w-full rounded-xl border-gray-300 px-4 py-3">{{ old('description') }}</textarea>


</div>





<!-- WhatsApp -->


<div class="mb-6">

<label class="block font-semibold mb-2">

Numéro WhatsApp

</label>


<input
type="text"
name="whatsapp"
value="{{ old('whatsapp') }}"
placeholder="Ex: 0700000000"
class="w-full rounded-xl border-gray-300 px-4 py-3">


</div>





<!-- Ville + Quartier -->


<div class="grid md:grid-cols-2 gap-6">


<div>

<label class="block font-semibold mb-2">

Ville

</label>


<input
type="text"
name="ville"
value="{{ old('ville') }}"
placeholder="Ex: Bouaké"
class="w-full rounded-xl border-gray-300 px-4 py-3">


</div>



<div>

<label class="block font-semibold mb-2">

Quartier

</label>


<input
type="text"
name="quartier"
value="{{ old('quartier') }}"
placeholder="Ex: Air France"
class="w-full rounded-xl border-gray-300 px-4 py-3">


</div>


</div>





<!-- Expérience -->


<div class="mb-6 mt-6">


<label class="block font-semibold mb-2">

Années d'expérience

</label>


<input
type="number"
name="experience"
value="{{ old('experience') }}"
min="0"
class="w-full rounded-xl border-gray-300 px-4 py-3">


</div>





<!-- Adresse -->


<div class="mb-6">

<label class="block font-semibold mb-2">

Adresse (facultatif)

</label>


<input
type="text"
name="adresse"
value="{{ old('adresse') }}"
class="w-full rounded-xl border-gray-300 px-4 py-3">


</div>

<!-- Pièce d'identité -->

<div class="mb-8 mt-8">

    <div class="flex items-start gap-4 mb-5">

        <div class="w-12 h-12 rounded-2xl bg-blue-100 flex items-center justify-center text-2xl">
            🪪
        </div>

        <div>
            <h3 class="text-xl font-bold text-gray-900">
                Vérification de votre identité
            </h3>

            <p class="text-sm text-gray-500 mt-1">
                Fournissez le recto et le verso d'une pièce d'identité
                lisible afin de permettre la vérification de votre profil.
            </p>
        </div>

    </div>


    <!-- Information -->

    <div class="mb-6 rounded-2xl border border-blue-100 bg-blue-50 p-4">

        <div class="flex items-start gap-3">

            <div class="text-xl">
                🔒
            </div>

            <div>

                <p class="font-semibold text-blue-900">
                    Vos documents restent confidentiels
                </p>

                <p class="text-sm text-blue-800 mt-1">
                    Ces documents sont utilisés uniquement dans le cadre
                    de la vérification de votre identité.
                </p>

            </div>

        </div>

    </div>


    <div class="grid md:grid-cols-2 gap-6">


        <!-- RECTO -->

        <div>

            <label class="block font-semibold text-gray-800 mb-3">
                Recto de la pièce d'identité
                <span class="text-red-500">*</span>
            </label>


            <label
                for="piece_identite_recto"
                class="group block cursor-pointer"
            >

                <div
                    class="relative min-h-[260px] rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50 hover:border-blue-500 hover:bg-blue-50 transition overflow-hidden"
                >

                    <!-- Zone par défaut -->

                    <div
                        id="rectoPlaceholder"
                        class="absolute inset-0 flex flex-col items-center justify-center text-center p-6"
                    >

                        <div class="w-16 h-16 rounded-2xl bg-white shadow-sm flex items-center justify-center text-3xl mb-4">
                            📄
                        </div>

                        <p class="font-semibold text-gray-800">
                            Ajouter le recto
                        </p>

                        <p class="text-sm text-gray-500 mt-1">
                            Cliquez pour sélectionner votre document
                        </p>

                        <span class="mt-3 text-xs text-gray-400">
                            JPG, PNG, WEBP ou PDF • 5 Mo maximum
                        </span>

                    </div>


                    <!-- Aperçu -->

                    <div
                        id="rectoPreviewContainer"
                        class="hidden absolute inset-0 bg-white"
                    >

                        <img
                            id="rectoPreview"
                            class="w-full h-full object-contain"
                            alt="Aperçu du recto"
                        >

                        <div
                            id="rectoPdfPreview"
                            class="hidden absolute inset-0 flex flex-col items-center justify-center bg-gray-50"
                        >

                            <div class="text-5xl mb-3">
                                📄
                            </div>

                            <p class="font-semibold text-gray-800">
                                Document PDF sélectionné
                            </p>

                            <p
                                id="rectoFileName"
                                class="text-sm text-gray-500 mt-1 px-4 text-center"
                            ></p>

                        </div>


                        <div class="absolute bottom-0 left-0 right-0 bg-black/60 text-white px-4 py-3 text-sm">
                            Cliquer pour remplacer le document
                        </div>

                    </div>

                </div>

            </label>


            <input
                type="file"
                id="piece_identite_recto"
                name="piece_identite_recto"
                accept="image/jpeg,image/png,image/webp,application/pdf"
                class="hidden"
                onchange="previewIdentityDocument(
                    this,
                    'rectoPreviewContainer',
                    'rectoPlaceholder',
                    'rectoPreview',
                    'rectoPdfPreview',
                    'rectoFileName'
                )"
            >


            @error('piece_identite_recto')

                <p class="text-red-600 text-sm mt-2">
                    {{ $message }}
                </p>

            @enderror

        </div>



        <!-- VERSO -->

        <div>

            <label class="block font-semibold text-gray-800 mb-3">
                Verso de la pièce d'identité
                <span class="text-red-500">*</span>
            </label>


            <label
                for="piece_identite_verso"
                class="group block cursor-pointer"
            >

                <div
                    class="relative min-h-[260px] rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50 hover:border-blue-500 hover:bg-blue-50 transition overflow-hidden"
                >

                    <!-- Zone par défaut -->

                    <div
                        id="versoPlaceholder"
                        class="absolute inset-0 flex flex-col items-center justify-center text-center p-6"
                    >

                        <div class="w-16 h-16 rounded-2xl bg-white shadow-sm flex items-center justify-center text-3xl mb-4">
                            📄
                        </div>

                        <p class="font-semibold text-gray-800">
                            Ajouter le verso
                        </p>

                        <p class="text-sm text-gray-500 mt-1">
                            Cliquez pour sélectionner votre document
                        </p>

                        <span class="mt-3 text-xs text-gray-400">
                            JPG, PNG, WEBP ou PDF • 5 Mo maximum
                        </span>

                    </div>


                    <!-- Aperçu -->

                    <div
                        id="versoPreviewContainer"
                        class="hidden absolute inset-0 bg-white"
                    >

                        <img
                            id="versoPreview"
                            class="w-full h-full object-contain"
                            alt="Aperçu du verso"
                        >

                        <div
                            id="versoPdfPreview"
                            class="hidden absolute inset-0 flex flex-col items-center justify-center bg-gray-50"
                        >

                            <div class="text-5xl mb-3">
                                📄
                            </div>

                            <p class="font-semibold text-gray-800">
                                Document PDF sélectionné
                            </p>

                            <p
                                id="versoFileName"
                                class="text-sm text-gray-500 mt-1 px-4 text-center"
                            ></p>

                        </div>


                        <div class="absolute bottom-0 left-0 right-0 bg-black/60 text-white px-4 py-3 text-sm">
                            Cliquer pour remplacer le document
                        </div>

                    </div>

                </div>

            </label>


            <input
                type="file"
                id="piece_identite_verso"
                name="piece_identite_verso"
                accept="image/jpeg,image/png,image/webp,application/pdf"
                class="hidden"
                onchange="previewIdentityDocument(
                    this,
                    'versoPreviewContainer',
                    'versoPlaceholder',
                    'versoPreview',
                    'versoPdfPreview',
                    'versoFileName'
                )"
            >


            @error('piece_identite_verso')

                <p class="text-red-600 text-sm mt-2">
                    {{ $message }}
                </p>

            @enderror

        </div>

    </div>


    <!-- Conseil -->

    <div class="mt-5 flex items-start gap-3 rounded-2xl bg-gray-50 border border-gray-200 p-4">

        <span class="text-xl">
            💡
        </span>

        <div class="text-sm text-gray-600">

            <p class="font-semibold text-gray-800 mb-1">
                Conseil
            </p>

            <p>
                Assurez-vous que votre pièce est entièrement visible,
                nette et lisible. Évitez les photos floues ou trop sombres.
            </p>

        </div>

    </div>

</div>


<input type="hidden" name="latitude" id="latitude">

<input type="hidden" name="longitude" id="longitude">



<div class="mb-6">

    <label class="block font-semibold mb-2">
        Localisation
    </label>

    <button
        type="button"
        onclick="getLocation()"
        class="px-5 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700">

        📍 Utiliser ma position actuelle

    </button>

    <p id="locationStatus" class="text-sm text-gray-500 mt-3">
        Aucune position détectée.
    </p>

</div>


<button
type="submit"
class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700">

Envoyer ma demande

</button>



</form>



</div>



</div>




<x-footer />



<script>

    function previewIdentityDocument(
    input,
    previewContainerId,
    placeholderId,
    previewId,
    pdfPreviewId,
    fileNameId
) {

    const file = input.files[0];

    if (!file) {
        return;
    }

    const previewContainer =
        document.getElementById(previewContainerId);

    const placeholder =
        document.getElementById(placeholderId);

    const preview =
        document.getElementById(previewId);

    const pdfPreview =
        document.getElementById(pdfPreviewId);

    const fileName =
        document.getElementById(fileNameId);


    placeholder.classList.add('hidden');

    previewContainer.classList.remove('hidden');


    // Si c'est une image

    if (file.type.startsWith('image/')) {

        preview.classList.remove('hidden');

        pdfPreview.classList.add('hidden');

        const reader = new FileReader();

        reader.onload = function(event) {

            preview.src = event.target.result;

        };

        reader.readAsDataURL(file);

    }


    // Si c'est un PDF

    else if (file.type === 'application/pdf') {

        preview.classList.add('hidden');

        pdfPreview.classList.remove('hidden');

        fileName.textContent = file.name;

    }

}

function toggleMenu(){

    let menu = document.getElementById('userMenu');

    menu.classList.toggle('hidden');

}



function getLocation(){

    if(!navigator.geolocation){

        alert("La géolocalisation n'est pas supportée par votre navigateur.");

        return;

    }

    document.getElementById('locationStatus').innerHTML =
        "Recherche de votre position...";

    navigator.geolocation.getCurrentPosition(

        function(position){

            document.getElementById('latitude').value =
                position.coords.latitude;

            document.getElementById('longitude').value =
                position.coords.longitude;

            document.getElementById('locationStatus').innerHTML =
                "✅ Position enregistrée avec succès.";

        },

        function(){

            document.getElementById('locationStatus').innerHTML =
                "❌ Impossible de récupérer votre position.";

        }

    );

}

</script>



</body>

</html>
