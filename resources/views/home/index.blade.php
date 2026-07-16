<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proxi Bouaké</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900">


<!-- NAVBAR -->
<nav class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <h1 class="text-2xl font-bold text-blue-600">
            Proxi<span class="text-gray-900">Bouaké</span>
        </h1>


        <div class="space-x-5">
            <a href="#" class="text-gray-600 hover:text-blue-600">
                Accueil
            </a>

            <a href="#" class="text-gray-600 hover:text-blue-600">
                Services
            </a>

            <a href="/login"
            class="bg-blue-600 text-white px-5 py-2 rounded-full hover:bg-blue-700">
                Connexion
            </a>
        </div>

    </div>
</nav>



<!-- HERO -->
<section class="bg-gradient-to-r from-blue-600 to-indigo-600">

<div class="max-w-7xl mx-auto px-6 py-24 text-center text-white">

<h2 class="text-5xl font-bold mb-5">
Trouvez un service proche de vous
</h2>


<p class="text-lg mb-10">
Les meilleurs prestataires à Bouaké rapidement et facilement
</p>



<!-- BARRE RECHERCHE -->

<div class="bg-white rounded-2xl shadow-xl p-4 max-w-4xl mx-auto">

<form class="flex flex-col md:flex-row gap-4">


<div class="flex-1">
<input 
type="text"
placeholder="Quel service recherchez-vous ?"
class="w-full px-5 py-4 rounded-xl border text-gray-800 focus:ring-2 focus:ring-blue-500">
</div>



<div class="flex-1">

<input 
type="text"
placeholder="Votre quartier"
class="w-full px-5 py-4 rounded-xl border text-gray-800">

</div>


<button
class="bg-blue-600 text-white px-8 py-4 rounded-xl hover:bg-blue-700">

Rechercher

</button>


</form>


</div>


</div>

</section>





<!-- SERVICES -->

<section class="max-w-7xl mx-auto px-6 py-16">


<h2 class="text-3xl font-bold text-center mb-4">
Nos services
</h2>


<p class="text-center text-gray-600 max-w-3xl mx-auto mb-12">

ProxiBouaké est une plateforme qui met en relation les habitants
avec des professionnels et prestataires de services proches d'eux.
Que vous cherchiez un chauffeur, un réparateur, un artisan ou un
spécialiste, trouvez rapidement la personne qu'il vous faut.

</p>



<div class="grid md:grid-cols-3 gap-8">



<!-- TRANSPORT -->

<div class="bg-white rounded-2xl shadow p-6 hover:shadow-xl transition">

<div class="text-4xl mb-4">
🚗
</div>

<h3 class="text-xl font-bold">
Transport
</h3>

<p class="text-gray-600 mt-2">
Trouvez un chauffeur, taxi ou moto-taxi disponible près de vous.
</p>

</div>



<!-- DEPANNAGE -->

<div class="bg-white rounded-2xl shadow p-6 hover:shadow-xl transition">

<div class="text-4xl mb-4">
🔧
</div>

<h3 class="text-xl font-bold">
Dépannage
</h3>

<p class="text-gray-600 mt-2">
Mécaniciens, plombiers et électriciens à votre service.
</p>

</div>



<!-- MAISON -->

<div class="bg-white rounded-2xl shadow p-6 hover:shadow-xl transition">

<div class="text-4xl mb-4">
🏠
</div>

<h3 class="text-xl font-bold">
Maison
</h3>

<p class="text-gray-600 mt-2">
Ménage, jardinage, entretien et services à domicile.
</p>

</div>



<!-- LIVRAISON -->

<div class="bg-white rounded-2xl shadow p-6 hover:shadow-xl transition">

<div class="text-4xl mb-4">
📦
</div>

<h3 class="text-xl font-bold">
Livraison
</h3>

<p class="text-gray-600 mt-2">
Faites livrer vos colis, courses et documents rapidement.
</p>

</div>



<!-- INFORMATIQUE -->

<div class="bg-white rounded-2xl shadow p-6 hover:shadow-xl transition">

<div class="text-4xl mb-4">
💻
</div>

<h3 class="text-xl font-bold">
Informatique
</h3>

<p class="text-gray-600 mt-2">
Réparation PC, installation logiciels et assistance numérique.
</p>

</div>



<!-- BEAUTÉ -->

<div class="bg-white rounded-2xl shadow p-6 hover:shadow-xl transition">

<div class="text-4xl mb-4">
💇
</div>

<h3 class="text-xl font-bold">
Beauté & Bien-être
</h3>

<p class="text-gray-600 mt-2">
Coiffeurs, maquilleurs et professionnels de beauté.
</p>

</div>



<!-- RESTAURATION -->

<div class="bg-white rounded-2xl shadow p-6 hover:shadow-xl transition">

<div class="text-4xl mb-4">
🍽️
</div>

<h3 class="text-xl font-bold">
Restauration
</h3>

<p class="text-gray-600 mt-2">
Découvrez des cuisiniers, traiteurs et restaurants proches.
</p>

</div>



<!-- EVENEMENT -->

<div class="bg-white rounded-2xl shadow p-6 hover:shadow-xl transition">

<div class="text-4xl mb-4">
📸
</div>

<h3 class="text-xl font-bold">
Événementiel
</h3>

<p class="text-gray-600 mt-2">
Photographes, décorateurs et animateurs pour vos événements.
</p>

</div>



<!-- FORMATION -->

<div class="bg-white rounded-2xl shadow p-6 hover:shadow-xl transition">

<div class="text-4xl mb-4">
📚
</div>

<h3 class="text-xl font-bold">
Formation
</h3>

<p class="text-gray-600 mt-2">
Cours particuliers et formations professionnelles.
</p>

</div>



</div>


</section>


<x-footer />