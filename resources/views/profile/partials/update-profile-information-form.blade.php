<section class="space-y-6">


<header>

<h2 class="text-2xl font-bold text-gray-900 dark:text-white">

👤 Informations personnelles

</h2>


<p class="mt-2 text-gray-600 dark:text-gray-400">

Mettez à jour vos informations afin de faciliter vos échanges avec les prestataires ProxiBouaké.

</p>


</header>





<form id="send-verification" method="post" action="{{ route('verification.send') }}">

@csrf

</form>





<form method="post" action="{{ route('profile.update') }}" class="mt-8 space-y-6">


@csrf

@method('patch')





<div class="grid md:grid-cols-2 gap-6">





<!-- NOM -->


<div>

<label for="name"
class="block text-sm font-medium text-gray-700 dark:text-gray-300">

Nom complet

</label>


<input

id="name"

name="name"

type="text"

:value="old('name', $user->name)"

value="{{ old('name', $user->name) }}"

required

autocomplete="name"

class="mt-2 w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">



<x-input-error 
class="mt-2"
:messages="$errors->get('name')" />


</div>







<!-- EMAIL -->


<div>


<label for="email"
class="block text-sm font-medium text-gray-700 dark:text-gray-300">

Email

</label>



<input

id="email"

name="email"

type="email"

value="{{ old('email', $user->email) }}"

required

autocomplete="username"

class="mt-2 w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">



<x-input-error 
class="mt-2"
:messages="$errors->get('email')" />



</div>








<!-- TELEPHONE -->


<div>


<label for="phone"
class="block text-sm font-medium text-gray-700 dark:text-gray-300">

Téléphone

</label>



<input

id="phone"

name="phone"

type="text"

value="{{ old('phone', $user->phone) }}"

placeholder="Ex: 0700000000"

class="mt-2 w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">



<x-input-error 
class="mt-2"
:messages="$errors->get('phone')" />



</div>








<!-- VILLE -->


<div>


<label for="ville"
class="block text-sm font-medium text-gray-700 dark:text-gray-300">

Ville

</label>



<input

id="ville"

name="ville"

type="text"

value="{{ old('ville', $user->ville) }}"

placeholder="Ex: Bouaké"

class="mt-2 w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">



<x-input-error 
class="mt-2"
:messages="$errors->get('ville')" />


</div>








<!-- QUARTIER -->


<div>


<label for="quartier"
class="block text-sm font-medium text-gray-700 dark:text-gray-300">

Quartier

</label>



<input

id="quartier"

name="quartier"

type="text"

value="{{ old('quartier', $user->quartier) }}"

placeholder="Ex: N'Dakro"

class="mt-2 w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">



<x-input-error 
class="mt-2"
:messages="$errors->get('quartier')" />



</div>





</div>








@if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

<div class="mt-4 p-4 bg-yellow-50 rounded-xl">


<p class="text-sm text-yellow-700">

Votre adresse email n'est pas encore vérifiée.


<button 
form="send-verification"
class="underline font-semibold">

Renvoyer le mail de vérification

</button>


</p>



@if (session('status') === 'verification-link-sent')

<p class="mt-2 text-green-600 text-sm">

Un nouveau lien de vérification a été envoyé.

</p>

@endif



</div>

@endif







<div class="flex items-center gap-5">


<button

class="bg-blue-600 text-white px-8 py-3 rounded-xl hover:bg-blue-700 transition">

💾 Enregistrer les modifications

</button>






@if (session('status') === 'profile-updated')


<p

x-data="{show:true}"

x-show="show"

x-transition

x-init="setTimeout(()=>show=false,2000)"

class="text-green-600 font-medium">

✓ Profil mis à jour

</p>



@endif



</div>



</form>



</section>