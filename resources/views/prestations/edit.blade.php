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


<div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold">

{{ strtoupper(substr(Auth::user()->name,0,1)) }}

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






<!-- IMAGE ACTUELLE -->


@if($prestation->image)


<div class="mb-6">


<p class="font-semibold mb-3">
Image actuelle
</p>


<img src="{{ asset('storage/'.$prestation->image) }}"
class="w-40 h-40 object-cover rounded-xl">


</div>


@endif







<!-- NOUVELLE IMAGE -->


<div class="mb-6">


<label class="block font-semibold mb-2">

Changer l'image

</label>


<input type="file"
name="image"
class="w-full border rounded-xl px-4 py-3">


@error('image')

<p class="text-red-600 text-sm">
{{ $message }}
</p>

@enderror


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

</script>



</body>

</html>