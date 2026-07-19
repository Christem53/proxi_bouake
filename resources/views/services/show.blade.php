<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>
{{ $prestation->titre }} - Proxi Bouaké
</title>

@vite(['resources/css/app.css','resources/js/app.js'])

</head>


<body class="bg-gray-100 text-gray-900">



<!-- NAVBAR -->

<nav class="bg-white shadow">

<div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">


<h1 class="text-2xl font-bold text-blue-600">
    Proxi<span class="text-gray-900">Bouaké</span>
</h1>



<div class="flex items-center gap-6">


<a href="{{ route('dashboard') }}"
class="text-gray-600 hover:text-blue-600">

Accueil

</a>



<a href="#"
class="text-gray-600 hover:text-blue-600">

Mes demandes

</a>




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
Client
</p>

</div>


<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
d="M19 9l-7 7-7-7"/>
</svg>


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


</nav>







<!-- CONTENU -->

<div class="max-w-7xl mx-auto px-6 py-10">





<!-- DETAIL SERVICE -->

<div class="bg-white rounded-3xl shadow overflow-hidden">





@if($prestation->image)


<img 
src="{{ asset('storage/'.$prestation->image) }}"
onclick="openImage(this.src)"
class="w-full h-[450px] object-cover cursor-pointer hover:scale-105 transition">


@else


<div class="h-[450px] bg-gray-200 flex items-center justify-center text-gray-500">

Aucune image disponible

</div>


@endif





<!-- GALERIE IMAGES SUPPLEMENTAIRES -->

@if($prestation->images->count())


<div class="p-6 bg-gray-50">


<h2 class="text-xl font-bold mb-4">

Galerie photos

</h2>




<div class="grid grid-cols-2 md:grid-cols-5 gap-4">



@foreach($prestation->images as $image)



<img 
src="{{ asset('storage/'.$image->image) }}"
onclick="openImage(this.src)"
class="h-32 w-full object-cover rounded-xl shadow cursor-pointer hover:scale-105 transition">



@endforeach



</div>



</div>


@endif







<div class="p-8">





<div class="flex justify-between items-start flex-wrap gap-5">


<div>


<h1 class="text-3xl font-bold">

{{ $prestation->titre }}

</h1>




<p class="text-gray-500 mt-2">

💻 {{ $prestation->category?->name ?? 'Catégorie non définie' }}

</p>


</div>



@if($prestation->prix)


<div class="bg-blue-100 text-blue-600 px-5 py-3 rounded-xl font-bold text-xl">

{{ number_format($prestation->prix,0,' ',' ') }} FCFA

</div>


@endif



</div>







<div class="mt-8">


<h2 class="text-xl font-bold mb-3">

Description du service

</h2>



<p class="text-gray-700 leading-relaxed">

{{ $prestation->description }}

</p>



</div>







<div class="mt-8 bg-gray-100 rounded-2xl p-5">


<h2 class="font-bold text-xl mb-4">

Informations du prestataire

</h2>



<p>

👤 
{{ $prestation->prestataire?->user?->name ?? 'Prestataire' }}

</p>



<p class="mt-2">

🏢 
{{ $prestation->prestataire?->nom_entreprise ?? 'Entreprise non définie' }}

</p>



<p class="mt-2">

📞 
{{ $prestation->prestataire?->whatsapp ?? 'Contact non disponible' }}

</p>



<p class="mt-2">

📍 
{{ $prestation->prestataire?->ville ?? 'Ville non définie' }}

</p>



<p class="mt-2">

📌
{{ $prestation->prestataire?->quartier ?? 'Quartier non défini' }}

</p>


</div>






<a href="https://wa.me/225{{ $prestation->prestataire?->whatsapp ?? '' }}"
target="_blank"

class="block mt-8 bg-green-500 hover:bg-green-600 text-white text-center py-4 rounded-xl font-bold">


Contacter sur WhatsApp


</a>




</div>




</div>




</div>






<x-footer />







<!-- MODAL IMAGE -->

<div id="imageModal"
class="hidden fixed inset-0 bg-black/80 z-50 flex items-center justify-center">



<div class="relative">


<button onclick="closeImage()"

class="absolute -top-5 -right-5 bg-white rounded-full w-10 h-10 text-xl">

✕

</button>




<img id="modalImage"

class="max-h-[90vh] max-w-5xl rounded-xl shadow-lg">


</div>


</div>







<script>


function toggleMenu(){

let menu=document.getElementById('userMenu');

menu.classList.toggle('hidden');

}




function openImage(image){

document.getElementById('modalImage').src=image;

document.getElementById('imageModal')
.classList.remove('hidden');

}





function closeImage(){

document.getElementById('imageModal')
.classList.add('hidden');

}


</script>



</body>

</html>