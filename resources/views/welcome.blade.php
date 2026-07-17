<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"
href="https://unpkg.com/leaflet/dist/leaflet.css">

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<title>Proxi Bouaké</title>

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


<a href="/" class="text-gray-600 hover:text-blue-600">
Accueil
</a>


<a href="#services" class="text-gray-600 hover:text-blue-600">
Services
</a>



@auth


<a href="{{ route('dashboard') }}"
class="text-gray-600 hover:text-blue-600">

Dashboard

</a>



@else


<a href="{{ route('login') }}"
class="text-gray-600 hover:text-blue-600">

Connexion

</a>



<a href="{{ route('register') }}"
class="bg-blue-600 text-white px-5 py-2 rounded-xl hover:bg-blue-700">

Inscription

</a>


@endauth



</div>


</div>


</nav>







<!-- HERO -->


<section class="max-w-7xl mx-auto px-6 py-10">



<div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-3xl p-10 text-white">



<h2 class="text-4xl font-bold">

Trouvez facilement un professionnel à Bouaké 👋

</h2>



<p class="mt-3 text-lg">

Plombiers, mécaniciens, informaticiens, coiffeurs et plusieurs autres services près de chez vous.

</p>





<form action="{{ route('search') }}" method="GET"
class="bg-white mt-8 p-4 rounded-2xl flex flex-col md:flex-row gap-4">



<input 
type="text"
name="service"
placeholder="Ex: mécanicien, coiffeur, informaticien..."
class="flex-1 px-5 py-3 rounded-xl border text-gray-800">



<input 
type="text"
name="quartier"
placeholder="Votre quartier"
class="flex-1 px-5 py-3 rounded-xl border text-gray-800">



<button
type="submit"
class="bg-blue-600 text-white px-8 py-3 rounded-xl">

Rechercher

</button>



</form>



</div>



</section>








<!-- CATEGORIES -->


<section id="services"
class="max-w-7xl mx-auto px-6 mt-10">



<h2 class="text-2xl font-bold mb-6">

Catégories populaires

</h2>




<div class="grid md:grid-cols-4 gap-6">



@forelse($categories as $category)



<div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition">



<i
data-lucide="{{ $category->icon }}"
class="w-10 h-10 text-blue-600">
</i>



<h3 class="font-bold mt-4">

{{ $category->name }}

</h3>



<p class="text-gray-500 mt-2">

Trouvez un professionnel spécialisé.

</p>



</div>



@empty


<p class="text-gray-500">

Aucune catégorie disponible.

</p>


@endforelse



</div>


</section>









<!-- PRESTATIONS -->


<section class="max-w-7xl mx-auto px-6 mt-12">



<h2 class="text-2xl font-bold mb-6">

Prestations disponibles

</h2>





<div class="grid md:grid-cols-3 gap-6">



@forelse($prestations as $prestation)



<div class="bg-white rounded-2xl shadow overflow-hidden hover:shadow-xl transition">





@if($prestation->image)


<img src="{{ asset('storage/'.$prestation->image) }}"
class="w-full h-52 object-cover">


@else


<div class="h-52 bg-gray-200 flex items-center justify-center text-4xl">

📷

</div>


@endif






<div class="p-6">



<div class="flex items-center gap-3">



<i
data-lucide="{{ $prestation->category->icon }}"
class="w-8 h-8 text-blue-600">
</i>



<h3 class="font-bold text-xl">

{{ $prestation->titre }}

</h3>



</div>





<p class="text-gray-600 mt-4">

{{ Str::limit($prestation->description,100) }}

</p>





<p class="mt-3 font-semibold">

Catégorie :

{{ $prestation->category->name }}

</p>





<p class="text-gray-500 text-sm mt-2">

Prestataire :

{{ $prestation->user->name }}

</p>






@if($prestation->prix)


<p class="text-blue-600 font-bold mt-3">

{{ number_format($prestation->prix,0,' ',' ') }} FCFA

</p>


@endif






@auth


<a href="#"
class="block mt-5 text-center bg-blue-600 text-white py-3 rounded-xl hover:bg-blue-700">

Contacter

</a>



@else


<a href="{{ route('login') }}"
class="block mt-5 text-center bg-blue-600 text-white py-3 rounded-xl hover:bg-blue-700">

Se connecter pour contacter

</a>



@endauth





</div>



</div>




@empty


<div class="bg-white rounded-2xl shadow p-8 text-center col-span-3">

<p class="text-gray-500">

Aucune prestation disponible pour le moment.

</p>

</div>


@endforelse



</div>



</section>




<!-- CARTE GEOLOCALISATION -->


<section class="max-w-7xl mx-auto px-6 mt-12">


<h2 class="text-2xl font-bold mb-6">

Trouver un prestataire près de vous

</h2>



<div class="bg-white rounded-2xl shadow p-6">



<p class="text-gray-500 mb-5">

Localisez rapidement les professionnels disponibles autour de vous.

</p>



<div id="map"
class="w-full h-96 rounded-2xl">
</div>



</div>


</section>



<!-- DEVENIR PRESTATAIRE -->


<section class="max-w-7xl mx-auto px-6 mt-12 mb-10">



<div class="bg-blue-600 text-white rounded-3xl p-10 text-center">



<h2 class="text-3xl font-bold">

Vous proposez un service ?

</h2>



<p class="mt-3 text-lg">

Rejoignez ProxiBouaké et présentez votre activité.

</p>




<a href="{{ route('register') }}"
class="inline-block mt-6 bg-white text-blue-600 px-8 py-3 rounded-xl font-semibold">

Créer mon profil

</a>



</div>



</section>







<x-footer />


<script>

document.addEventListener('DOMContentLoaded', function(){


    let map = L.map('map').setView(
        [7.6939, -5.0306],
        13
    );



    L.tileLayer(
        'https://tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            attribution:
            '&copy; OpenStreetMap contributors'
        }
    ).addTo(map);



    // Récupération des prestataires depuis Laravel

    let prestataires = @json($prestataires);



    prestataires.forEach(function(prestataire){


        if(prestataire.latitude && prestataire.longitude){


            let nom = prestataire.nom_entreprise 
                ? prestataire.nom_entreprise 
                : prestataire.user.name;



            L.marker([
                parseFloat(prestataire.latitude),
                parseFloat(prestataire.longitude)
            ])
            .addTo(map)
            .bindPopup(`

                <div style="min-width:220px">


                    <h3 style="font-weight:bold;font-size:16px;">
                        ${nom}
                    </h3>


                    <p>
                        👤 ${prestataire.user.name}
                    </p>


                    <p>
                        🛠 ${prestataire.category.name}
                    </p>


                    <p>
                        📍 ${prestataire.ville}
                    </p>


                    <p>
                        🏠 ${prestataire.quartier ?? ''}
                    </p>


                    <p>
                        📞 ${prestataire.whatsapp}
                    </p>


                </div>

            `);


        }


    });



});

</script>


</body>

</html>