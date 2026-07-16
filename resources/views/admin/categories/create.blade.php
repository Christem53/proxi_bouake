<x-admin-layout>


<div class="max-w-3xl mx-auto">


    <div class="mb-8">

        <h2 class="text-3xl font-bold">
            Ajouter une catégorie
        </h2>

        <p class="text-gray-600 mt-2">
            Créez une nouvelle catégorie de service pour les utilisateurs.
        </p>

    </div>




    <div class="bg-white rounded-2xl shadow p-8">


        <form action="{{ route('categories.store') }}" method="POST">

            @csrf



            <!-- NOM -->

            <div class="mb-6">

                <label class="block font-semibold mb-2">
                    Nom de la catégorie
                </label>


                <input 
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Ex: Transport"
                    class="w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-blue-500 focus:border-blue-500"
                >


                @error('name')

                    <p class="text-red-600 text-sm mt-2">
                        {{ $message }}
                    </p>

                @enderror

            </div>





            <!-- ICON -->

            <!-- ICON -->

<div class="mb-6">

    <label class="block font-semibold mb-2">
        Icône
    </label>


    <div class="grid grid-cols-4 gap-4">


        <!-- Transport -->
        <label class="cursor-pointer">

            <input 
                type="radio" 
                name="icon" 
                value="car"
                class="hidden peer"
            >

            <div class="p-4 border rounded-xl text-center 
                        peer-checked:border-blue-600 
                        peer-checked:bg-blue-50
                        hover:bg-gray-50">

                <i data-lucide="car" class="w-8 h-8 mx-auto"></i>

                <p class="text-sm mt-2">
                    Transport
                </p>

            </div>

        </label>





        <!-- Dépannage -->
        <label class="cursor-pointer">

            <input 
                type="radio" 
                name="icon" 
                value="wrench"
                class="hidden peer"
            >

            <div class="p-4 border rounded-xl text-center 
                        peer-checked:border-blue-600 
                        peer-checked:bg-blue-50">

                <i data-lucide="wrench" class="w-8 h-8 mx-auto"></i>

                <p class="text-sm mt-2">
                    Dépannage
                </p>

            </div>

        </label>





        <!-- Maison -->
        <label class="cursor-pointer">

            <input 
                type="radio" 
                name="icon" 
                value="house"
                class="hidden peer"
            >

            <div class="p-4 border rounded-xl text-center 
                        peer-checked:border-blue-600 
                        peer-checked:bg-blue-50">

                <i data-lucide="house" class="w-8 h-8 mx-auto"></i>

                <p class="text-sm mt-2">
                    Maison
                </p>

            </div>

        </label>





        <!-- Informatique -->
        <label class="cursor-pointer">

            <input 
                type="radio" 
                name="icon" 
                value="monitor"
                class="hidden peer"
            >

            <div class="p-4 border rounded-xl text-center 
                        peer-checked:border-blue-600 
                        peer-checked:bg-blue-50">

                <i data-lucide="monitor" class="w-8 h-8 mx-auto"></i>

                <p class="text-sm mt-2">
                    Informatique
                </p>

            </div>

        </label>






        <!-- Livraison -->
        <label class="cursor-pointer">

            <input 
                type="radio" 
                name="icon" 
                value="truck"
                class="hidden peer"
            >

            <div class="p-4 border rounded-xl text-center 
                        peer-checked:border-blue-600 
                        peer-checked:bg-blue-50">

                <i data-lucide="truck" class="w-8 h-8 mx-auto"></i>

                <p class="text-sm mt-2">
                    Livraison
                </p>

            </div>

        </label>






        <!-- Restaurant -->
        <label class="cursor-pointer">

            <input 
                type="radio" 
                name="icon" 
                value="utensils"
                class="hidden peer"
            >

            <div class="p-4 border rounded-xl text-center 
                        peer-checked:border-blue-600 
                        peer-checked:bg-blue-50">

                <i data-lucide="utensils" class="w-8 h-8 mx-auto"></i>

                <p class="text-sm mt-2">
                    Restaurant
                </p>

            </div>

        </label>



    </div>



    @error('icon')

        <p class="text-red-600 text-sm mt-2">
            {{ $message }}
        </p>

    @enderror


</div>


            <!-- DESCRIPTION -->

            <div class="mb-6">


                <label class="block font-semibold mb-2">
                    Description
                </label>



                <textarea
                    name="description"
                    rows="5"
                    placeholder="Décrivez cette catégorie..."
                    class="w-full rounded-xl border-gray-300 px-4 py-3"
                >{{ old('description') }}</textarea>



                @error('description')

                    <p class="text-red-600 text-sm mt-2">
                        {{ $message }}
                    </p>

                @enderror


            </div>







            <div class="flex justify-between items-center">


                <a href="{{ route('categories.index') }}"
                class="px-5 py-3 rounded-xl bg-gray-200 hover:bg-gray-300">

                    Annuler

                </a>





                <button 
                type="submit"
                class="px-6 py-3 rounded-xl bg-blue-600 text-white hover:bg-blue-700">

                    Enregistrer

                </button>


            </div>



        </form>


    </div>


</div>



</x-admin-layout>

<script>
    lucide.createIcons();
</script>