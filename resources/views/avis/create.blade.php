<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Laisser un avis - ProxiBouaké</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="max-w-3xl mx-auto py-10 px-6">

    <div class="bg-white rounded-3xl shadow-lg p-8">

        <a href="{{ url()->previous() }}"
        class="inline-flex items-center mb-6 bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-xl">
            ← Retour
        </a>

        <h1 class="text-3xl font-bold mb-2">
            ⭐ Laisser un avis
        </h1>

        <p class="text-gray-500 mb-8">
            Votre avis aidera les autres clients à choisir un bon prestataire.
        </p>

        <form action="{{ route('avis.store') }}" method="POST">

            @csrf

            <input type="hidden"
                   name="demande_id"
                   value="{{ $demande->id }}">

            <div class="mb-8">

                <label class="block font-semibold mb-4">
                    Note
                </label>

                <div class="flex gap-3 text-5xl">

                    @for($i=1;$i<=5;$i++)

                        <label class="cursor-pointer">

                            <input
                                type="radio"
                                name="note"
                                value="{{ $i }}"
                                class="hidden">

                            <span class="star text-gray-300 hover:text-yellow-400">
                                ★
                            </span>

                        </label>

                    @endfor

                </div>

            </div>

            <div class="mb-6">

                <label class="block font-semibold mb-3">
                    Commentaire
                </label>

                <textarea
                    name="commentaire"
                    rows="5"
                    class="w-full border rounded-xl p-4"
                    placeholder="Partagez votre expérience..."></textarea>

            </div>

            <button
                class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl">
                ⭐ Envoyer mon avis
            </button>

        </form>

    </div>

</div>

<script>

const stars = document.querySelectorAll('.star');
const radios = document.querySelectorAll('input[name="note"]');

stars.forEach((star,index)=>{

    star.addEventListener('click',()=>{

        radios[index].checked = true;

        stars.forEach((s,i)=>{

            if(i<=index){

                s.classList.remove('text-gray-300');
                s.classList.add('text-yellow-400');

            }else{

                s.classList.remove('text-yellow-400');
                s.classList.add('text-gray-300');

            }

        });

    });

});

</script>

</body>
</html>