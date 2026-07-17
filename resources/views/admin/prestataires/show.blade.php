<x-admin-layout>

<div class="max-w-5xl mx-auto">


<div class="mb-8">

<h2 class="text-3xl font-bold">
Détails de la demande
</h2>

<p class="text-gray-600 mt-2">
Consultez les informations du candidat prestataire.
</p>

</div>




<div class="bg-white rounded-3xl shadow p-8">


<div class="grid md:grid-cols-2 gap-8">



<div>

<h3 class="text-lg font-bold mb-4">
Informations utilisateur
</h3>


<p class="mb-3">
<strong>Nom :</strong>
{{ $prestataire->user->name }}
</p>


<p class="mb-3">
<strong>Email :</strong>
{{ $prestataire->user->email }}
</p>


<p class="mb-3">
<strong>Téléphone :</strong>
{{ $prestataire->user->phone }}
</p>


</div>





<div>

<h3 class="text-lg font-bold mb-4">
Informations professionnelles
</h3>


<p class="mb-3">

<strong>Catégorie :</strong>

{{ $prestataire->category->icon }}

{{ $prestataire->category->name }}

</p>



<p class="mb-3">

<strong>Entreprise :</strong>

{{ $prestataire->nom_entreprise ?? 'Non renseigné' }}

</p>



<p class="mb-3">

<strong>Expérience :</strong>

{{ $prestataire->experience }} ans

</p>



</div>


</div>





<hr class="my-8">





<h3 class="text-lg font-bold mb-4">
Description
</h3>


<p class="text-gray-600">

{{ $prestataire->description }}

</p>






<hr class="my-8">





<div class="grid md:grid-cols-3 gap-6">


<div>

<strong>Ville</strong>

<p>
{{ $prestataire->ville }}
</p>

</div>



<div>

<strong>Quartier</strong>

<p>
{{ $prestataire->quartier }}
</p>

</div>



<div>

<strong>WhatsApp</strong>

<p>
{{ $prestataire->whatsapp }}
</p>

</div>


</div>





<div class="mt-10 flex gap-4">



<form action="{{ route('prestataires.accepter',$prestataire->id) }}" method="POST">

@csrf

<button
class="px-6 py-3 bg-green-600 text-white rounded-xl">

✅ Accepter

</button>

</form>





<form action="{{ route('prestataires.refuser',$prestataire->id) }}" method="POST">

@csrf

<button
class="px-6 py-3 bg-red-600 text-white rounded-xl">

❌ Refuser

</button>

</form>



</div>




</div>


</div>


</x-admin-layout>