<x-admin-layout>

<div class="max-w-3xl mx-auto">


    <div class="mb-8">

        <h2 class="text-3xl font-bold">
            Modifier une catégorie
        </h2>

        <p class="text-gray-600 mt-2">
            Modifiez les informations de cette catégorie.
        </p>

    </div>



    <div class="bg-white rounded-2xl shadow p-8">


        <form action="{{ route('categories.update', $category->id) }}" method="POST">

            @csrf
            @method('PUT')



            <!-- NOM -->

            <div class="mb-6">

                <label class="block font-semibold mb-2">
                    Nom de la catégorie
                </label>


                <input 
                    type="text"
                    name="name"
                    value="{{ old('name', $category->name) }}"
                    class="w-full rounded-xl border-gray-300 px-4 py-3"
                >


                @error('name')

                    <p class="text-red-600 text-sm mt-2">
                        {{ $message }}
                    </p>

                @enderror

            </div>





            <!-- ICON -->

            <div class="mb-6">

                <label class="block font-semibold mb-2">
                    Icône
                </label>


                <select 
                    name="icon"
                    class="w-full rounded-xl border-gray-300 px-4 py-3">


                    <option value="car" 
                    {{ $category->icon == 'car' ? 'selected' : '' }}>
                        🚗 Transport
                    </option>


                    <option value="wrench"
                    {{ $category->icon == 'wrench' ? 'selected' : '' }}>
                        🔧 Dépannage
                    </option>


                    <option value="house"
                    {{ $category->icon == 'house' ? 'selected' : '' }}>
                        🏠 Maison
                    </option>


                    <option value="monitor"
                    {{ $category->icon == 'monitor' ? 'selected' : '' }}>
                        💻 Informatique
                    </option>


                    <option value="truck"
                    {{ $category->icon == 'truck' ? 'selected' : '' }}>
                        📦 Livraison
                    </option>


                    <option value="utensils"
                    {{ $category->icon == 'utensils' ? 'selected' : '' }}>
                        🍽️ Restaurant
                    </option>


                </select>


            </div>






            <!-- DESCRIPTION -->


            <div class="mb-6">


                <label class="block font-semibold mb-2">
                    Description
                </label>



                <textarea
                    name="description"
                    rows="5"
                    class="w-full rounded-xl border-gray-300 px-4 py-3"
                >{{ old('description', $category->description) }}</textarea>


            </div>






            <div class="flex justify-between">


                <a href="{{ route('categories.index') }}"
                class="px-5 py-3 bg-gray-200 rounded-xl">

                    Annuler

                </a>




                <button 
                    type="submit"
                    class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700">

                    Modifier

                </button>


            </div>



        </form>


    </div>


</div>


</x-admin-layout>