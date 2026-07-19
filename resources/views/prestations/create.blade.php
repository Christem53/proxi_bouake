<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Publier une prestation - ProxiBouaké</title>

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

Prestataire

</p>

</div>


</button>





<div id="userMenu"
class="hidden absolute right-0 mt-3 w-52 bg-white rounded-xl shadow-lg z-50">


<a href="{{ route('profile.edit') }}"
class="block px-5 py-3 hover:bg-gray-100">

👤 Mon profil

</a>



<a href="{{ route('prestations.index') }}"
class="block px-5 py-3 hover:bg-gray-100">

🛠 Mes prestations

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


<div class="max-w-4xl mx-auto px-6 py-10">



<div class="mb-8">


<h2 class="text-3xl font-bold">

Publier une prestation

</h2>



<p class="text-gray-600 mt-2">

Présentez votre service aux utilisateurs de ProxiBouaké.

</p>


</div>






<div class="bg-white rounded-3xl shadow p-8">



<form action="{{ route('prestations.store') }}"
method="POST"
enctype="multipart/form-data">


@csrf






<!-- CATEGORIE -->


<div class="mb-6">


<label class="block font-semibold mb-2">

Catégorie

</label>



<select name="category_id"
class="w-full rounded-xl border-gray-300 px-4 py-3">


<option value="">

Choisir une catégorie

</option>



@foreach($categories as $category)


<option value="{{ $category->id }}">


{{ $category->icon }}

{{ $category->name }}


</option>



@endforeach



</select>


@error('category_id')

<p class="text-red-600 text-sm mt-2">

{{ $message }}

</p>

@enderror


</div>








<!-- TITRE -->


<div class="mb-6">


<label class="block font-semibold mb-2">

Titre de la prestation

</label>



<input

type="text"

name="titre"

value="{{ old('titre') }}"

placeholder="Ex: Dépannage informatique"

class="w-full rounded-xl border-gray-300 px-4 py-3">



@error('titre')

<p class="text-red-600 text-sm mt-2">

{{ $message }}

</p>

@enderror


</div>








<!-- IMAGES -->

<div class="mb-8">

    <label class="block text-lg font-semibold mb-4">
        Photos de la prestation
    </label>

    <!-- Image principale -->
    <div class="mb-6">

        <label class="block font-medium mb-2 text-gray-700">
            Image principale
        </label>

        <div class="border-2 border-dashed border-blue-300 rounded-2xl p-6 bg-blue-50 hover:bg-blue-100 transition">

            <input
                type="file"
                id="image"
                name="image"
                accept="image/*"
                class="hidden">

            <label for="image" class="cursor-pointer flex flex-col items-center">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-12 h-12 text-blue-600 mb-3"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 15a4 4 0 014-4h1m4-4h1a4 4 0 014 4m-4 4v4m0 0l-3-3m3 3l3-3"/>

                </svg>

                <span class="text-blue-700 font-medium">
                    Cliquez pour choisir une image
                </span>

                <span class="text-sm text-gray-500 mt-1">
                    JPG, PNG, JPEG
                </span>

            </label>

        </div>

        <div class="mt-4">
            <img id="previewPrincipale"
                 class="hidden w-48 h-48 object-cover rounded-2xl shadow-lg border">
        </div>

    </div>





    <!-- Images supplémentaires -->

    <div>

        <label class="block font-medium mb-2 text-gray-700">
            Images supplémentaires
        </label>

        <div class="border-2 border-dashed border-gray-300 rounded-2xl p-6 hover:bg-gray-50 transition">

            <input
                type="file"
                id="images"
                name="images[]"
                multiple
                accept="image/*"
                class="hidden">

            <label for="images"
                class="cursor-pointer flex flex-col items-center">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-12 h-12 text-gray-500 mb-3"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 16l4-4 4 4 8-8"/>

                </svg>

                <span class="font-medium">
                    Ajouter plusieurs images
                </span>

                <span class="text-sm text-gray-500">
                    Vous pouvez sélectionner plusieurs photos
                </span>

            </label>

        </div>

        <div id="previewGalerie"
             class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-5">
        </div>

    </div>

    <p class="text-sm text-gray-500 mt-4">
        L'image principale sera utilisée comme photo de couverture.
        Les autres seront visibles dans la galerie de votre prestation.
    </p>

</div>








<!-- DESCRIPTION -->


<div class="mb-6">


<label class="block font-semibold mb-2">

Description du service

</label>



<textarea

name="description"

rows="5"

placeholder="Décrivez votre service..."

class="w-full rounded-xl border-gray-300 px-4 py-3">{{ old('description') }}</textarea>



@error('description')

<p class="text-red-600 text-sm mt-2">

{{ $message }}

</p>

@enderror


</div>








<!-- PRIX -->


<div class="mb-6">


<label class="block font-semibold mb-2">

Prix (FCFA)

</label>



<input

type="number"

name="prix"

value="{{ old('prix') }}"

placeholder="Ex: 15000"

class="w-full rounded-xl border-gray-300 px-4 py-3">



@error('prix')

<p class="text-red-600 text-sm mt-2">

{{ $message }}

</p>

@enderror


</div>








<div class="flex justify-between items-center">


<a href="{{ route('prestations.index') }}"

class="px-5 py-3 rounded-xl bg-gray-200 hover:bg-gray-300">

Annuler

</a>




<button

type="submit"

class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700">

Publier la prestation

</button>



</div>





</form>


</div>


</div>







<x-footer />






<script>


// ==========================
// Galerie images supplémentaires
// ==========================

const inputImages = document.getElementById('images');

const galerie = document.getElementById('previewGalerie');

let selectedFiles = [];



inputImages.addEventListener('change', function(e){


    const nouveauxFichiers = Array.from(e.target.files);



    if(selectedFiles.length + nouveauxFichiers.length > 5){

        alert("Vous pouvez sélectionner au maximum 5 images supplémentaires.");

        return;

    }



    selectedFiles = [
        ...selectedFiles,
        ...nouveauxFichiers
    ];



    mettreAJourInput();

    afficherGalerie();


});





function afficherGalerie(){


    galerie.innerHTML = "";



    selectedFiles.forEach((file,index)=>{


        const container = document.createElement("div");

        container.className="relative group";



        const img = document.createElement("img");


        img.src = URL.createObjectURL(file);


        img.className =
        "w-full h-36 object-cover rounded-xl shadow border group-hover:scale-105 transition";





        const bouton = document.createElement("button");


        bouton.type="button";


        bouton.innerHTML="✖";


        bouton.className =
        "absolute top-2 right-2 bg-red-600 text-white rounded-full w-7 h-7 hover:bg-red-700";





        bouton.onclick=function(){


            selectedFiles.splice(index,1);


            mettreAJourInput();


            afficherGalerie();


        };





        container.appendChild(img);


        container.appendChild(bouton);


        galerie.appendChild(container);



    });



}





// Met à jour réellement le champ input file

function mettreAJourInput(){


    const dataTransfer = new DataTransfer();



    selectedFiles.forEach(file=>{


        dataTransfer.items.add(file);


    });



    inputImages.files = dataTransfer.files;


}


</script>



</body>

</html>