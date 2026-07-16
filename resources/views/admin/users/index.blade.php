<x-admin-layout>

<div class="max-w-7xl mx-auto">

    <div class="flex justify-between items-center mb-8">

        <div>
            <h2 class="text-3xl font-bold">
                Gestion des utilisateurs
            </h2>

            <p class="text-gray-500 mt-2">
                Gérez les comptes des utilisateurs de Proxi Bouaké.
            </p>
        </div>


        <form action="{{ route('users.index') }}" method="GET">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Rechercher un utilisateur..."
                class="w-80 rounded-xl border-gray-300 px-4 py-3 focus:ring-blue-500 focus:border-blue-500">

        </form>

    </div>




    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-4 text-left">
                        Nom
                    </th>

                    <th class="p-4 text-left">
                        Email
                    </th>

                    <th class="p-4 text-left">
                        Téléphone
                    </th>

                    <th class="p-4 text-left">
                        Ville
                    </th>

                    <th class="p-4 text-left">
                        Rôle
                    </th>

                    <th class="p-4 text-center">
                        Actions
                    </th>

                </tr>

            </thead>


            <tbody>

            @forelse($users as $user)

                <tr class="border-b hover:bg-gray-50">

                    <td class="p-4 font-medium">
                        {{ $user->name }}
                    </td>

                    <td class="p-4">
                        {{ $user->email }}
                    </td>

                    <td class="p-4">
                        {{ $user->phone }}
                    </td>

                    <td class="p-4">
                        {{ $user->ville }}
                    </td>

                    <td class="p-4">

                        @if($user->role == 'admin')

                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-600 text-sm font-medium">
                                Administrateur
                            </span>

                        @elseif($user->role == 'prestataire')

                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-600 text-sm font-medium">
                                Prestataire
                            </span>

                        @else

                            <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-600 text-sm font-medium">
                                Client
                            </span>

                        @endif

                    </td>


                    <td class="p-4">

                        <div class="flex justify-center gap-4">

                            <a href="{{ route('users.edit',$user->id) }}"
                               class="text-blue-600 hover:underline">

                                Modifier

                            </a>


                            <form action="{{ route('users.destroy',$user->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')">

                                @csrf
                                @method('DELETE')

                                <button class="text-red-600 hover:underline">

                                    Supprimer

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center py-8 text-gray-500">

                        Aucun utilisateur trouvé.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>


        <div class="p-6">

            {{ $users->links() }}

        </div>

    </div>

</div>

</x-admin-layout>