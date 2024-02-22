<x-app-layout>
    <div class="relative bg-gray-50 dark:bg-slate-900 w-full h-full pattern">
        <section class="container mx-auto p-6 font-mono flex justify-end">
            <div class="w-[90%] mb-8 overflow-hidden rounded-lg shadow-lg">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-[#ffb703] uppercase border-b border-gray-600">
                                <th class="px-4 py-3">ID</th>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Description</th>
                                <th class="px-4 py-3">Matricule</th>
                                <th class="px-4 py-3">Date de création</th>
                                <th class="px-4 py-3">Delete</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse($chauffeurs as $chauffeur)
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 text-ms font-semibold border">{{ $chauffeur->id }}</td>
                                    <td class="px-4 py-3 border">
                                        <div class="flex items-center text-sm">
                                            <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full" src="{{ asset('storage/' . $chauffeur->picture) }}" alt="" loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-black">{{ $chauffeur->name }}</p>
                                                <p class="text-xs text-gray-600">{{ $chauffeur->role }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-ms font-semibold border">{{ $chauffeur->email }}</td>
                                    <td class="px-4 py-3 text-sm border">{{ $chauffeur->description }}</td>
                                    <td class="px-4 py-3 text-sm border">{{ $chauffeur->matricule }}</td>
                                    <td class="px-4 py-3 text-sm border">{{ $chauffeur->created_at }}</td>
                                    <td class="px-4 py-3 text-xs border">
                                        <form action="{{ route('chauffeurs.delete', ['id' => $chauffeur->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 text-white p-2 rounded-md mt-4 hover:bg-red-800 w-full">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">No chauffeurs found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-8 flex justify-center">
                {{$chauffeur->links('pagination::tailwind')}}
            </div>
        </section>

        @include('admin.sidebar')
    </div>
</x-app-layout>
