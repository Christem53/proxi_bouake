<x-admin-layout>

<div class="max-w-7xl mx-auto">


<div class="mb-8">

<h2 class="text-3xl font-bold">
Demandes de prestataires
</h2>


<p class="text-gray-600 mt-2">
Gérez les utilisateurs qui souhaitent proposer leurs services sur ProxiBouaké.
</p>


</div>




<div class="bg-white rounded-3xl shadow overflow-hidden">


<table class="w-full">


<thead class="bg-gray-100">


<tr>


<th class="p-4 text-left">
Nom
</th>


<th class="p-4 text-left">
Catégorie
</th>


<th class="p-4 text-left">
Ville
</th>


<th class="p-4 text-left">
WhatsApp
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


@forelse($prestataires as $prestataire)


<tr class="border-b hover:bg-gray-50">


<td class="p-4">

{{ $prestataire->user->name }}

</td>



<td class="p-4">

{{ $prestataire->category->icon }}

{{ $prestataire->category->name }}

</td>




<td class="p-4">

{{ $prestataire->ville }}

</td>




<td class="p-4">

{{ $prestataire->whatsapp }}

</td>




<td class="p-4">


@if($prestataire->statut == 'accepte')


<span class="px-3 py-1 rounded-full bg-green-100 text-green-600">

Accepté

</span>



@elseif($prestataire->statut == 'refuse')


<span class="px-3 py-1 rounded-full bg-red-100 text-red-600">

Refusé

</span>



@else


<span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-600">

En attente

</span>


@endif



</td>





<td class="p-4 text-center">


<a href="{{ route('prestataires.show',$prestataire->id) }}"
class="text-blue-600 hover:underline">

Voir

</a>



</td>



</tr>


@empty


<tr>

<td colspan="6" class="p-8 text-center text-gray-500">

Aucune demande trouvée.

</td>

</tr>


@endforelse



</tbody>


</table>



</div>


</div>


</x-admin-layout>