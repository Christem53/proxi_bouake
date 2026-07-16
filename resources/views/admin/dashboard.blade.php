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
0
</p>

</div>




<div class="bg-white rounded-2xl shadow p-6">

<h3 class="text-gray-500">
Catégories
</h3>

<p class="text-4xl font-bold text-green-600">
0
</p>

</div>




<div class="bg-white rounded-2xl shadow p-6">

<h3 class="text-gray-500">
Prestataires
</h3>

<p class="text-4xl font-bold text-orange-600">
0
</p>

</div>




<div class="bg-white rounded-2xl shadow p-6">

<h3 class="text-gray-500">
Demandes
</h3>

<p class="text-4xl font-bold text-red-600">
0
</p>

</div>



</div>

<!-- PERFORMANCE -->

<div class="bg-white rounded-2xl shadow p-8 mt-10">


    <div class="flex justify-between items-center mb-6">

        <h2 class="text-xl font-bold">
            Performance de la plateforme
        </h2>


        <select class="border rounded-lg px-3 py-2 text-sm">

            <option>
                Cette semaine
            </option>

            <option>
                Ce mois
            </option>

            <option>
                Cette année
            </option>

        </select>

    </div>



    <canvas id="performanceChart" height="100"></canvas>


</div>



</x-admin-layout>