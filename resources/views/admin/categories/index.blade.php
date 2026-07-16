<x-admin-layout>


<div class="flex justify-between items-center mb-8">


<h2 class="text-3xl font-bold">
Gestion des catégories
</h2>


<a href="{{ route('categories.create') }}"
class="bg-blue-600 text-white px-5 py-3 rounded-xl">

+ Ajouter une catégorie

</a>


</div>





<div class="bg-white rounded-2xl shadow overflow-hidden">


<table class="w-full">


<thead class="bg-gray-100">

<tr>

<th class="p-4 text-left">
Icon
</th>


<th class="p-4 text-left">
Nom
</th>


<th class="p-4 text-left">
Description
</th>


<th class="p-4 text-left">
Actions
</th>


</tr>

</thead>




<tbody>


@foreach($categories as $category)

<tr class="border-t">


<td class="p-4 text-3xl">
{{ $category->icon }}
</td>


<td class="p-4 font-bold">
{{ $category->name }}
</td>


<td class="p-4 text-gray-600">
{{ $category->description }}
</td>


<td class="p-4">


<a href="{{ route('categories.edit', $category->id) }}"
class="text-blue-600 hover:underline">

    Modifier

</a>


<form action="{{ route('categories.destroy',$category->id) }}" method="POST"
      onsubmit="return confirm('Voulez-vous supprimer cette catégorie ?');">

    @csrf
    @method('DELETE')

    <button class="text-red-600 hover:underline">
        Supprimer
    </button>

</form>


</td>


</tr>


@endforeach


</tbody>


</table>


</div>



</x-admin-layout>