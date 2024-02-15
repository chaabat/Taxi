<x-app-layout>
    <div class="relative bg-gray-50 dark:bg-slate-900 w-full h-full pattern ">


<section class="container mx-auto p-6 font-mono flex justify-end">
    <div class="w-[90%] mb-8 overflow-hidden rounded-lg shadow-lg">
      <div class="w-full overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-[#ffb703] uppercase border-b border-gray-600">
              <th class="px-4 py-3">ID</th>
              <th class="px-4 py-3">Départ</th>
              <th class="px-4 py-3">Destination</th>
              <th class="px-4 py-3">Rating</th>
              <th class="px-4 py-3">Date de création</th>
              <th class="px-4 py-3">Delete</th>
            </tr>
          </thead>
          <tbody class="bg-white">
            @forelse($reservations as $reservation)
            <tr class="text-gray-700">
            <td class="px-4 py-3 text-ms font-semibold border">{{ $reservation->id }}</td>
              <td class="px-4 py-3 text-ms font-semibold border">{{ $reservation->depart }}</td>
              <td class="px-4 py-3 text-sm font-semibold border">{{ $reservation->destination }}</td>
              <td class="px-4 py-3 text-sm border">{{ $reservation->rating }}</td>
              <td class="px-4 py-3 text-sm border">{{ $reservation->created_at }}</td>
              <td class="px-4 py-3 text-xs border">
                <form action="{{ route('reservation.delete',  ['id' => $reservation->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-600 text-white p-2 rounded-md mt-4 hover:bg-red-800 w-full">Delete</button>
                </form>
                
              </td>
            </tr>
            
            @empty
            <tr>
                <td colspan="7" class="text-center py-4">No Reservations found.</td>
            </tr>
        @endforelse 
          </tbody>
        </table>
      </div>
    </div>
  </section>






@include('admin.sidebar')

    </div>


</x-app-layout>
