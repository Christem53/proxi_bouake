<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Modifier une prestation - ProxiBouaké</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="bg-gray-100 text-gray-900">



<nav class="bg-white shadow">

<div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">


<h1 class="text-2xl font-bold text-blue-600">
    Proxi<span class="text-gray-900">Bouaké</span>
</h1>


<div class="flex items-center gap-6">


<a href="{{ route('prestations.index') }}"
class="text-gray-600 hover:text-blue-600">

Mes prestations

</a>



<div class="relative">


<button onclick="toggleMenu()"
class="flex items-center gap-3">


<div class="w-10 h-10 rounded-full overflow-hidden bg-blue-600 text-white flex items-center justify-center font-bold">

    @if(Auth::user()->photo)
        <img
            src="{{ asset('storage/' . Auth::user()->photo) }}"
            alt="Photo de profil"
            class="w-full h-full object-cover"
        >
    @else
        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
    @endif

</div>


<div>

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


<form method="POST" action="{{ route('logout') }}">

@csrf


<button
class="w-full text-left px-5 py-3 text-red-600 hover:bg-gray-100">

🚪 Déconnexion

</button>


</form>


</div>


</div>


</div>


</div>

</nav>






<div class="max-w-4xl mx-auto px-6 py-10">



<div class="mb-8">

<h2 class="text-3xl font-bold">

Modifier la prestation

</h2>


<p class="text-gray-600 mt-2">

Mettez à jour les informations de votre service.

</p>

</div>






<div class="bg-white rounded-3xl shadow p-8">



<form action="{{ route('prestations.update',$prestation->id) }}"
method="POST"
enctype="multipart/form-data">


@csrf

@method('PUT')






<!-- IMAGES -->

<div class="mb-6">

<label class="block text-lg font-semibold mb-3">
    Photos de la prestation
</label>


<!-- IMAGE PRINCIPALE -->

<div class="mb-5">

<label class="block font-medium mb-2 text-gray-700">
    Image principale
</label>


@if($prestation->image)

<div class="mb-3">

<img src="{{ asset('storage/'.$prestation->image) }}"
class="w-32 h-32 object-cover rounded-xl shadow border">

</div>

@endif



<div class="border-2 border-dashed border-blue-300 rounded-xl p-4 bg-blue-50 hover:bg-blue-100 transition">


<input
type="file"
id="image"
name="image"
accept="image/*"
class="hidden">



<label for="image"
class="cursor-pointer flex flex-col items-center">


<svg xmlns="http://www.w3.org/2000/svg"
class="w-8 h-8 text-blue-600 mb-2"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">


<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M3 15a4 4 0 014-4h1m4-4h1a4 4 0 014 4m-4 4v4m0 0l-3-3m3 3l3-3"/>

</svg>


<span class="text-blue-700 text-sm font-medium">

Changer l'image principale

</span>


<span class="text-xs text-gray-500">

JPG, PNG, JPEG

</span>


</label>


</div>



<img id="previewPrincipale"
class="hidden mt-3 w-32 h-32 object-cover rounded-xl shadow border">


</div>







<!-- GALERIE EXISTANTE -->


<div class="mb-5">


<label class="block font-medium mb-2 text-gray-700">

Galerie actuelle

</label>



<div class="grid grid-cols-3 md:grid-cols-5 gap-3">


@foreach($prestation->images as $image)


<img src="{{ asset('storage/'.$image->image) }}"
class="w-full h-24 object-cover rounded-lg shadow border">


@endforeach



</div>


</div>








<!-- AJOUT NOUVELLES IMAGES -->


<div>


<label class="block font-medium mb-2 text-gray-700">

Ajouter des images

</label>


<div class="border-2 border-dashed border-gray-300 rounded-xl p-4 hover:bg-gray-50 transition">


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
class="w-8 h-8 text-gray-500 mb-2"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">


<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M4 16l4-4 4 4 8-8"/>

</svg>


<span class="text-sm font-medium">

Ajouter plusieurs images

</span>


<span class="text-xs text-gray-500">

Maximum 5 images

</span>


</label>


</div>



<div id="previewGalerie"
class="grid grid-cols-3 md:grid-cols-5 gap-3 mt-3">

</div>


</div>



<p class="text-xs text-gray-500 mt-3">

L'image principale sera utilisée comme couverture.
Les autres seront affichées dans la galerie.

</p>


</div>







<!-- CATEGORIE -->


<div class="mb-6">

<label class="block font-semibold mb-2">

Catégorie

</label>



<select name="category_id"
class="w-full rounded-xl border-gray-300 px-4 py-3">


@foreach($categories as $category)


<option value="{{ $category->id }}"
@if($category->id == $prestation->category_id)
selected
@endif
>

{{ $category->name }}

</option>


@endforeach


</select>


</div>








<!-- TITRE -->


<div class="mb-6">

<label class="block font-semibold mb-2">

Titre

</label>


<input type="text"
name="titre"
value="{{ old('titre',$prestation->titre) }}"
class="w-full rounded-xl border-gray-300 px-4 py-3">


</div>








<!-- DESCRIPTION -->


<div class="mb-6">


<label class="block font-semibold mb-2">

Description

</label>


<textarea
name="description"
rows="5"
class="w-full rounded-xl border-gray-300 px-4 py-3">{{ old('description',$prestation->description) }}</textarea>


</div>








<!-- PRIX -->


<div class="mb-6">


<label class="block font-semibold mb-2">

Prix (FCFA)

</label>


<input type="number"
name="prix"
value="{{ old('prix',$prestation->prix) }}"
class="w-full rounded-xl border-gray-300 px-4 py-3">


</div>







<div class="flex justify-between">


<a href="{{ route('prestations.index') }}"
class="px-5 py-3 bg-gray-200 rounded-xl">

Annuler

</a>




<button
class="px-6 py-3 bg-blue-600 text-white rounded-xl">

Enregistrer les modifications

</button>



</div>




</form>


</div>


</div>





<x-footer />



<script>

function toggleMenu(){

    let menu=document.getElementById('userMenu');

    menu.classList.toggle('hidden');

}



// ===============================
// Prévisualisation image principale
// ===============================

const inputImage = document.getElementById('image');

const previewPrincipale = document.getElementById('previewPrincipale');


inputImage.addEventListener('change', function(e){


    const file = e.target.files[0];


    if(!file) return;



    previewPrincipale.src = URL.createObjectURL(file);


    previewPrincipale.classList.remove('hidden');


});





// ===============================
// Prévisualisation galerie
// ===============================


const inputImages = document.getElementById('images');

const previewGalerie = document.getElementById('previewGalerie');


let selectedFiles = [];



inputImages.addEventListener('change', function(e){



    const nouveauxFichiers = Array.from(e.target.files);



    if(selectedFiles.length + nouveauxFichiers.length > 5){


        alert("Vous pouvez ajouter maximum 5 images supplémentaires.");


        return;

    }



    selectedFiles = [

        ...selectedFiles,

        ...nouveauxFichiers

    ];



    afficherGalerie();



});






function afficherGalerie(){


    previewGalerie.innerHTML="";



    selectedFiles.forEach((file,index)=>{



        const div = document.createElement('div');

        div.className="relative";



        const img = document.createElement('img');


        img.src = URL.createObjectURL(file);


        img.className="w-full h-24 object-cover rounded-lg shadow border";





        const bouton = document.createElement('button');


        bouton.type="button";


        bouton.innerHTML="✖";


        bouton.className=
        "absolute top-1 right-1 bg-red-600 text-white rounded-full w-6 h-6 text-xs";





        bouton.onclick=function(){


            selectedFiles.splice(index,1);


            afficherGalerie();


            mettreAJourInput();


        };





        div.appendChild(img);


        div.appendChild(bouton);


        previewGalerie.appendChild(div);



    });



}





// Garder les fichiers dans l'input

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
