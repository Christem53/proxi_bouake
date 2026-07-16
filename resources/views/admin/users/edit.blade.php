<x-admin-layout>

<div class="max-w-3xl mx-auto">

    <div class="mb-8">
        <h2 class="text-3xl font-bold">
            Modifier un utilisateur
        </h2>

        <p class="text-gray-600 mt-2">
            Modifiez les informations de cet utilisateur.
        </p>
    </div>

    <div class="bg-white rounded-2xl shadow p-8">

        <form action="{{ route('users.update', $user->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-6">
                <label class="block font-semibold mb-2">Nom</label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $user->name) }}"
                    class="w-full rounded-xl border-gray-300 px-4 py-3">
            </div>

            <div class="mb-6">
                <label class="block font-semibold mb-2">Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $user->email) }}"
                    class="w-full rounded-xl border-gray-300 px-4 py-3">
            </div>

            <div class="mb-6">
                <label class="block font-semibold mb-2">Téléphone</label>

                <input
                    type="text"
                    name="phone"
                    value="{{ old('phone', $user->phone) }}"
                    class="w-full rounded-xl border-gray-300 px-4 py-3">
            </div>

            <div class="mb-6">
                <label class="block font-semibold mb-2">Ville</label>

                <input
                    type="text"
                    name="ville"
                    value="{{ old('ville', $user->ville) }}"
                    class="w-full rounded-xl border-gray-300 px-4 py-3">
            </div>

            <div class="mb-6">
                <label class="block font-semibold mb-2">Rôle</label>

                <select
                    name="role"
                    class="w-full rounded-xl border-gray-300 px-4 py-3">

                    <option value="client" {{ $user->role == 'client' ? 'selected' : '' }}>
                        Client
                    </option>

                    <option value="prestataire" {{ $user->role == 'prestataire' ? 'selected' : '' }}>
                        Prestataire
                    </option>

                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                        Administrateur
                    </option>

                </select>
            </div>

            <div class="flex justify-between">

                <a href="{{ route('users.index') }}"
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