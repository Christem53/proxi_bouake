<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Mes prestations - ProxiBouaké</title>

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


<div class="max-w-6xl mx-auto py-10 px-6">





<div class="flex justify-between items-center mb-8">



<div>


<h2 class="text-3xl font-bold">

Mes prestations

</h2>



<p class="text-gray-600 mt-2">

Gérez vos services publiés sur ProxiBouaké.

</p>


</div>





<a href="{{ route('prestations.create') }}"
class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700">


➕ Ajouter une prestation


</a>




</div>








@if(session('success'))


<div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6">


{{ session('success') }}


</div>


@endif







<div class="grid md:grid-cols-3 gap-6">





@forelse($prestations as $prestation)





<div class="bg-white rounded-3xl shadow p-6">





<div class="flex items-center gap-3 mb-4">



<span class="text-3xl">

{{ $prestation->category->icon }}

</span>



<h3 class="font-bold text-xl">

{{ $prestation->titre }}

</h3>



</div>







<p class="text-gray-600 mb-4">


{{ Str::limit($prestation->description,100) }}


</p>







<p class="font-semibold">


Catégorie :

{{ $prestation->category->name }}


</p>








@if($prestation->prix)


<p class="mt-2">


Prix :

{{ number_format($prestation->prix) }} FCFA


</p>


@endif







<div class="mt-4">



@if($prestation->statut == 'actif')


<span class="px-3 py-1 bg-green-100 text-green-600 rounded-full">


Actif


</span>



@else



<span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full">


Inactif


</span>



@endif



</div>








<div class="flex gap-3 mt-6">



<a href="#"
class="px-4 py-2 bg-blue-600 text-white rounded-xl">


Modifier


</a>







<form action="#"
method="POST">


@csrf

@method('DELETE')



<button
class="px-4 py-2 bg-red-600 text-white rounded-xl">


Supprimer


</button>



</form>




</div>






</div>





@empty






<div class="col-span-3 bg-white rounded-2xl p-8 text-center">


<h3 class="text-xl font-bold">


Aucune prestation publiée


</h3>



<p class="text-gray-600 mt-2">


Commencez par ajouter votre premier service.


</p>



</div>





@endforelse






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