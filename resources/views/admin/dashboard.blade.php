<x-admin-layout>


<h2 class="text-3xl font-bold mb-8">
Bienvenue {{ Auth::user()->name }} 👋
</h2>



<div class="grid md:grid-cols-4 gap-6">



<div class="bg-white rounded-2xl shadow p-6">

<h3 class="text-gray-500">
Utilisateurs
</h3>

<p class="text-4xl font-bold text-blue-600">
    {{ $utilisateurs }}
</p>

</div>




<div class="bg-white rounded-2xl shadow p-6">

<h3 class="text-gray-500">
Catégories
</h3>

<p class="text-4xl font-bold text-green-600">
    {{ $categories }}
</p>

</div>




<div class="bg-white rounded-2xl shadow p-6">

<h3 class="text-gray-500">
Prestataires
</h3>

<p class="text-4xl font-bold text-orange-600">
    {{ $prestataires }}
</p>

</div>




<div class="bg-white rounded-2xl shadow p-6">

<h3 class="text-gray-500">
Demandes
</h3>

<p class="text-4xl font-bold text-red-600">
    {{ $demandes }}
</p>

</div>



</div>

<!-- PERFORMANCE -->

<div class="bg-white rounded-2xl shadow p-8 mt-10">


    <div class="flex justify-between items-center mb-6">

        <h2 class="text-xl font-bold">
            Performance de la plateforme
        </h2>


        <div class="flex justify-between items-center mb-6">

    <h2 class="text-xl font-bold">
        Performance de la plateforme
    </h2>

</div>

    </div>



    <canvas id="performanceChart" height="100"></canvas>


</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>

const ctx = document.getElementById('performanceChart');


new Chart(ctx, {

    type: 'bar',

    data: {

        labels: [
            'Utilisateurs',
            'Catégories',
            'Prestataires',
            'Demandes'
        ],


        datasets: [{

            label: 'Activité plateforme',

            data: [

                {{ $performance['utilisateurs'] }},
                {{ $performance['categories'] }},
                {{ $performance['prestataires'] }},
                {{ $performance['demandes'] }}

            ],

        }]

    },


    options: {

        responsive:true,

        scales: {

            y: {

                beginAtZero:true

            }

        }

    }

});


</script>



</x-admin-layout>