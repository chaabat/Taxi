<x-app-layout>

    <div class="relative bg-gray-50 dark:bg-slate-900 w-full h-full pattern">
        <div class="container">
            <h1 class="text-4xl font-bold font-mono text-center my-8">Historique de Réservations </h1>      
    
            @if($reservations->isEmpty())
                <h1 class="text-4xl font-bold font-mono text-center my-8">Aucune réservation trouvée. </h1>      
            @else
                @foreach(auth()->user()->reservations as $reservation)
                    <div class="border-4 border-dashed border-black max-w-md mx-auto bg-yellow-400 rounded-xl shadow-md overflow-hidden md:max-w-2xl m-5 flex flex-col md:flex-row justify-between items-start md:items-center">
                        <div class="md:flex-shrink-0">
                       
                            <span class="text-l font-mono text-left text-black">Réservation le : </span>
                                <p class=" text-l font-mono text-left text-white">{{ $reservation->created_at }}</p>                 
                                      
                                <img class=" rounded-full object-cover md:w-48" src="{{ optional($reservation->user)->picture }}" alt="">
                        </div>

                        <div class="flex  text-center mt-auto">
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset('photos/depart.png') }}" class="h-8 w-8" alt="">
                                <p>{{ $reservation->depart }}</p> 
                            </div>
                            <hr class="h-0.5 w-16 border-dashed border-2 border-black"></hr> 
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset('photos/destination.png') }}" class="h-8 w-8" alt="">
                                <p>{{ $reservation->destination }}</p> 
                            </div>     
                        </div>
                    
                        
                            
                            
                            <div class=" flex flex-col items-center space-y-4 md:mt-0 mt-4">
                                <div class="flex flex-col">  <span class="text-l font-mono text-left text-black">Date : </span>
                                <p class=" text-l font-mono text-left text-white">{{ $reservation->date }}</p></div>
                              

                                <form action="{{ route('update_favorit', ['reservation' => $reservation->id]) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" title="{{ $reservation->favorits === '1' ? 'Remove from Favorites' : 'Add to Favorites' }}">
                                        <svg class='h-12 w-12 {{ $reservation->favorits === '1' ? 'text-red-500' : 'text-gray-500' }}' viewBox='0 0 24 24' stroke='currentColor' aria-hidden="true">
                                            <title>{{ $reservation->favorits === '1' ? 'Favorite' : 'Not Favorite' }}</title>
                                            <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
                                        </svg>
                                    </button>
                                </form>
                                <form action="{{ route('rating', $reservation) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="flex items-center space-x-4 md:mt-0 mt-4">
                                        <select class="bg-yellow-400 w-14 py-2 px-4 border border-dashed border-2 border-black rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" name="rating" id="rating">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <button type="submit" class="flex-shrink-0"><img src="{{ asset('photos/star.png') }}" class="h-8 w-8" alt=""></button>
                                    </div>
                                    
                                </form>
                              
                                
                                
                            </div>
                            
                        </div>
                      
                        <div class="flex items-center justify-center">  
                            <form action="{{ route('commentaire', $reservation->id) }}" method="POST">
                                @csrf
                               
                              <input type="text" name="commentaire" >
                             
                        
                                <button type="submit" class="h-12 w-12" >
                                    comment
                                </button>
                            </form>
                        </div>

                        <div class="flex items-center justify-center">  
                            <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                        
                                @php
                                    $day = now()->subHours(24);
                                    $reservationDate = $reservation->created_at;
                                    $time = $reservationDate->lte($day);
                                @endphp
                        
                                <button type="submit" class="h-12 w-12" {{ $time ? 'disabled' : '' }}>
                                    <img src="{{ asset('photos/annule.png') }}" alt="Cancel">
                                </button>
                            </form>
                        </div>
                        
                     
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    
    @include('passager.sidebar')

</x-app-layout>
