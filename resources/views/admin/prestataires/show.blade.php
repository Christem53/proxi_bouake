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


<!-- Pièce d'identité -->

<hr class="my-8">

<div>

    <div class="flex items-center gap-3 mb-2">

        <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center text-xl">
            🪪
        </div>

        <div>

            <h3 class="text-lg font-bold">
                Pièce d'identité
            </h3>

            <p class="text-sm text-gray-500">
                Documents fournis pour la vérification de l'identité du candidat.
            </p>

        </div>

    </div>


    <div class="grid md:grid-cols-2 gap-6 mt-6">


        <!-- RECTO -->

        <div class="border border-gray-200 rounded-2xl p-5 bg-gray-50">

            <div class="flex items-center justify-between mb-4">

                <div>

                    <p class="font-semibold text-gray-900">
                        Recto
                    </p>

                    <p class="text-sm text-gray-500">
                        Face avant de la pièce
                    </p>

                </div>

                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold">
                    Document
                </span>

            </div>


            @if($prestataire->piece_identite_recto)

                <a
                    href="{{ route('admin.prestataires.piece', [$prestataire->id, 'recto']) }}"
                    target="_blank"
                    class="inline-flex items-center gap-2 px-5 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition"
                >

                    👁️ Voir le recto

                </a>

            @else

                <div class="text-sm text-red-600 bg-red-50 rounded-xl p-3">
                    ⚠️ Aucun recto fourni.
                </div>

            @endif

        </div>



        <!-- VERSO -->

        <div class="border border-gray-200 rounded-2xl p-5 bg-gray-50">

            <div class="flex items-center justify-between mb-4">

                <div>

                    <p class="font-semibold text-gray-900">
                        Verso
                    </p>

                    <p class="text-sm text-gray-500">
                        Face arrière de la pièce
                    </p>

                </div>

                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold">
                    Document
                </span>

            </div>


            @if($prestataire->piece_identite_verso)

                <a
                    href="{{ route('admin.prestataires.piece', [$prestataire->id, 'verso']) }}"
                    target="_blank"
                    class="inline-flex items-center gap-2 px-5 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition"
                >

                    👁️ Voir le verso

                </a>

            @else

                <div class="text-sm text-red-600 bg-red-50 rounded-xl p-3">
                    ⚠️ Aucun verso fourni.
                </div>

            @endif

        </div>

    </div>


    <div class="mt-4 flex items-start gap-3 rounded-xl bg-yellow-50 border border-yellow-200 p-4">

        <span class="text-lg">
            🔒
        </span>

        <p class="text-sm text-yellow-800">
            Ces documents sont confidentiels et doivent être consultés
            uniquement dans le cadre de la vérification du candidat.
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
