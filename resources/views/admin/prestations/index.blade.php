<x-admin-layout>

<div class="max-w-7xl mx-auto">


<div class="mb-8">

<h2 class="text-3xl font-bold">
Gestion des prestations
</h2>


<p class="text-gray-600 mt-2">
Validez ou refusez les prestations proposées par les prestataires sur ProxiBouaké.
</p>


</div>





<div class="bg-white rounded-3xl shadow overflow-hidden">


<table class="w-full">


<thead class="bg-gray-100">


<tr>


<th class="p-4 text-left">
Image
</th>


<th class="p-4 text-left">
Titre
</th>


<th class="p-4 text-left">
Prestataire
</th>


<th class="p-4 text-left">
Catégorie
</th>


<th class="p-4 text-left">
Prix
</th>


<th class="p-4 text-left">
Statut
</th>


<th class="p-4 text-center">
Action
</th>


</tr>


</thead>





<tbody>


@forelse($prestations as $prestation)


<tr class="border-b hover:bg-gray-50">



<!-- IMAGE -->

<td class="p-4">


@if($prestation->image)


<img src="{{ asset('storage/'.$prestation->image) }}"
class="w-16 h-16 rounded-xl object-cover">


@else


<div class="w-16 h-16 rounded-xl bg-gray-200 flex items-center justify-center">

📷

</div>


@endif


</td>





<!-- TITRE -->

<td class="p-4 font-semibold">

{{ $prestation->titre }}

</td>





<!-- PRESTATAIRE -->

<td class="p-4">

{{ $prestation->user->name }}

</td>





<!-- CATEGORIE -->

<td class="p-4">


<div class="flex items-center gap-2">


<i 
data-lucide="{{ $prestation->category->icon }}"
class="w-5 h-5 text-blue-600">
</i>


<span>

{{ $prestation->category->name }}

</span>


</div>


</td>






<!-- PRIX -->

<td class="p-4">


@if($prestation->prix)


{{ number_format($prestation->prix,0,' ',' ') }} FCFA


@else


Non défini


@endif


</td>






<!-- STATUT -->

<td class="p-4">


@if($prestation->statut == 'actif')


<span class="px-3 py-1 rounded-full bg-green-100 text-green-600">

Actif

</span>





@elseif($prestation->statut == 'refuse')


<span class="px-3 py-1 rounded-full bg-red-100 text-red-600">

Refusé

</span>





@elseif($prestation->statut == 'inactif')


<span class="px-3 py-1 rounded-full bg-gray-200 text-gray-700">

Désactivé

</span>





@else


<span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-600">

En attente

</span>


@endif



</td>








<!-- ACTION -->

<td class="p-4 text-center">



@if($prestation->statut == 'en_attente')


<div class="flex justify-center gap-3">


<form action="{{ route('admin.prestations.accepter',$prestation->id) }}"
method="POST">

@csrf


<button
class="px-4 py-2 rounded-xl bg-green-500 text-white hover:bg-green-600">

Accepter

</button>


</form>





<form action="{{ route('admin.prestations.refuser',$prestation->id) }}"
method="POST">

@csrf


<button
class="px-4 py-2 rounded-xl bg-red-500 text-white hover:bg-red-600">

Refuser

</button>


</form>


</div>







@elseif($prestation->statut == 'actif')



<form action="{{ route('admin.prestations.desactiver',$prestation->id) }}"
method="POST">

@csrf


<button
class="px-4 py-2 rounded-xl bg-orange-500 text-white hover:bg-orange-600">

Désactiver

</button>


</form>







@elseif($prestation->statut == 'inactif')



<form action="{{ route('admin.prestations.reactiver',$prestation->id) }}"
method="POST">

@csrf


<button
class="px-4 py-2 rounded-xl bg-blue-500 text-white hover:bg-blue-600">

Réactiver

</button>


</form>






@else


<span class="text-gray-400">

Aucune action

</span>


@endif



</td>



</tr>



@empty



<tr>

<td colspan="7" class="p-8 text-center text-gray-500">

Aucune prestation trouvée.

</td>

</tr>



@endforelse



</tbody>


</table>



</div>


</div>


</x-admin-layout>