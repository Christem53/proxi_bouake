<section class="space-y-6">


<header>

<h2 class="text-2xl font-bold text-gray-900 dark:text-white">

🔒 Sécurité du compte

</h2>


<p class="mt-2 text-gray-600 dark:text-gray-400">

Modifiez votre mot de passe régulièrement afin de protéger votre compte ProxiBouaké.

</p>


</header>





<form method="post" action="{{ route('password.update') }}" class="mt-8 space-y-6">


@csrf

@method('put')






<!-- ANCIEN MOT DE PASSE -->

<div>


<label for="update_password_current_password"
class="block text-sm font-medium text-gray-700 dark:text-gray-300">

Mot de passe actuel

</label>



<input

id="update_password_current_password"

name="current_password"

type="password"

autocomplete="current-password"

placeholder="Votre mot de passe actuel"

class="mt-2 w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">



<x-input-error 
:messages="$errors->updatePassword->get('current_password')" 
class="mt-2" />


</div>







<!-- NOUVEAU MOT DE PASSE -->


<div>


<label for="update_password_password"
class="block text-sm font-medium text-gray-700 dark:text-gray-300">

Nouveau mot de passe

</label>



<input

id="update_password_password"

name="password"

type="password"

autocomplete="new-password"

placeholder="Créer un nouveau mot de passe"

class="mt-2 w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">



<x-input-error 
:messages="$errors->updatePassword->get('password')" 
class="mt-2" />


</div>







<!-- CONFIRMATION -->


<div>


<label for="update_password_password_confirmation"
class="block text-sm font-medium text-gray-700 dark:text-gray-300">

Confirmer le mot de passe

</label>




<input

id="update_password_password_confirmation"

name="password_confirmation"

type="password"

autocomplete="new-password"

placeholder="Confirmer votre mot de passe"

class="mt-2 w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">



<x-input-error 
:messages="$errors->updatePassword->get('password_confirmation')" 
class="mt-2" />



</div>







<!-- BOUTON -->


<div class="flex items-center gap-5">


<button

class="bg-blue-600 text-white px-8 py-3 rounded-xl hover:bg-blue-700 transition">

💾 Enregistrer

</button>





@if (session('status') === 'password-updated')


<p

x-data="{ show:true }"

x-show="show"

x-transition

x-init="setTimeout(() => show=false,2000)"

class="text-green-600 font-medium">

✓ Mot de passe modifié avec succès

</p>



@endif



</div>





</form>


</section>