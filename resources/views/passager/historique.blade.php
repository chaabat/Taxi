<x-app-layout>

    <div class="relative bg-gray-50 dark:bg-slate-900 w-full h-full pattern">
        <div class="container">
            <h1 class="text-4xl font-bold font-mono text-center my-8">Historique de Réservations </h1>      

            @if($reservations->isEmpty())
                        <h1 class="text-4xl font-bold font-mono text-center my-8">Aucune réservation trouvée. </h1>      

            @else
               
     @foreach($reservations as $reservation)
<div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl m-5">
    <div class="md:flex">
        <div class="md:flex-shrink-0">
            <img class="h-48 w-full object-cover md:w-48" src="https://randomuser.me/api/portraits/men/1.jpg" alt="Event image">
        </div>
        <div class="p-8">
            <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">{{ $reservation->date }}</div>
            <p class="block mt-1 text-lg leading-tight font-medium text-black">{{ $reservation->depart }}</p>
            <p class="mt-2 text-gray-500">{{ $reservation->destination }}</p>
            <form action="{{ route('update_favorit', ['reservation' => $reservation->id]) }}" method="post">
                @csrf
                @method('PUT')
                <button type="submit" title="{{ $reservation->favorits === '1' ? 'Remove from Favorites' : 'Add to Favorites' }}">
                    <svg class='h-5 w-5 {{ $reservation->favorits === '1' ? 'text-red-500' : 'text-gray-500' }}' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                        <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20' />
                    </svg>
                </button>
            </form>

            <form action="{{ route('rating', $reservation) }}" method="post">
                @csrf
                @method('PUT')
                <label for="rating">Rating:</label>
                <select class="w-12" name="rating" id="rating">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <button type="submit">Submit Rating</button>
            </form>
        </div>
    </div>
</div>
@endforeach

                      
                  
            @endif
        </div>
    </div>
    @include('passager.sidebar')

</x-app-layout>
