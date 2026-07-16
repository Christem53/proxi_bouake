<section class="space-y-6">


<header>

<h2 class="text-2xl font-bold text-red-600">
    Supprimer mon compte
</h2>


<p class="mt-2 text-gray-600">

Cette action est définitive. Toutes vos informations personnelles,
vos demandes et vos données seront supprimées définitivement.

</p>


</header>





<button

x-data=""

x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"

class="bg-red-600 text-white px-6 py-3 rounded-xl hover:bg-red-700 transition">

🗑️ Supprimer mon compte

</button>







<x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>


<form method="post" action="{{ route('profile.destroy') }}" class="p-8">


@csrf

@method('delete')




<h2 class="text-2xl font-bold text-gray-900">

Êtes-vous sûr de vouloir supprimer votre compte ?

</h2>




<p class="mt-3 text-gray-600">

Cette action est irréversible.
Entrez votre mot de passe pour confirmer la suppression définitive.

</p>





<div class="mt-6">


<label class="block text-sm font-medium text-gray-700">

Mot de passe

</label>



<input

id="password"

name="password"

type="password"

placeholder="Votre mot de passe"

class="mt-2 w-full rounded-xl border-gray-300 focus:ring-red-500 focus:border-red-500">



@error('password')

<p class="text-red-600 text-sm mt-2">

{{ $message }}

</p>

@enderror



</div>







<div class="mt-8 flex justify-end gap-4">


<button

type="button"

x-on:click="$dispatch('close')"

class="px-6 py-3 rounded-xl bg-gray-200 hover:bg-gray-300">

Annuler

</button>





<button

class="px-6 py-3 rounded-xl bg-red-600 text-white hover:bg-red-700">

Confirmer la suppression

</button>



</div>



</form>


</x-modal>



</section>