<x-app-layout>

<div
    class="relative bg-gray-50 dark:bg-slate-900 w-full h-full pattern "
>
<div class="relative">
   
    <div class="flex flex-col items-center justify-center  p-14 relative z-10">
        <!-- Form -->
        <div class="mx-auto w-full max-w-[550px]">
            <form action="{{ route('routes.search') }}" method="post">
                @csrf
                <div class="flex flex-wrap items-center justify-between">
                    <!-- Departure -->
                    <div class="w-full sm:w-1/3 px-3">
                        <div class="mb-5">
                            <label for="depart" class="mb-3 block text-base font-medium text-[#07074D]">
                                Départ
                            </label>
                            <select name="depart" id="depart" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                <option value="hay wrida 1">hay wrida 1</option>
                                <option value="hay wrida 2">hay wrida 2</option>
                                <option value="kores">kores</option>
                                <option value="medina">medina</option>
                                <option value="hay anas">hay anas</option>
                                <option value="jrayfat">jrayfat</option>
                            </select>
                        </div>
                    </div>
                    <!-- Destination -->
                    <div class="w-full sm:w-1/3 px-3">
                        <div class="mb-5">
                            <label for="destination" class="mb-3 block text-base font-medium text-[#07074D]">
                                Destination
                            </label>
                            <select name="destination" id="destination" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                <option value="hay wrida 1">hay wrida 1</option>
                                <option value="hay wrida 2">hay wrida 2</option>
                                <option value="kores">kores</option>
                                <option value="medina">medina</option>
                                <option value="hay anas">hay anas</option>
                                <option value="jrayfat">jrayfat</option>
                            </select>
                        </div>
                    </div>
                    <!-- Date -->
                    <div class="w-full sm:w-1/3 px-3">
                        <div class="mb-5">
                            <label for="date" class="mb-3 block text-base font-medium text-[#07074D]">
                                Date
                            </label>
                            <input type="date" name="date" id="date" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                </div>
                
                <!-- Search Button -->
                <div class="w-full flex justify-center mt-5">
                    <button class="w-full hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                        Search
                    </button>
                </div>
            </form>
        </div>
        
 
        

            <div class="grid mt-8 gap-8 grid-cols-1 md:grid-cols-2 xl:grid-cols-2">
                @if ($routes->count() > 0)
            @foreach ($routes as $route)

            

                <div class="flex flex-col">
                    <div class="bg-white shadow-md rounded-3xl p-4">
                        <div class="flex-none lg:flex">
                            <div class="h-full w-full lg:h-48 lg:w-48 lg:mb-0 mb-3">
                                <img src="{{ asset('storage/' . optional($route)->picture) }}" alt="Chauffeur Picture" class="w-full object-scale-down lg:object-cover lg:h-48 rounded-2xl">
                            </div>
                            
                            <div class="flex-auto ml-3 justify-evenly py-2">
                                <div class="flex flex-wrap">
                                    <div class="w-full flex-none text-xs text-blue-700 font-medium">
                                    Chauffeur
                                    </div>
                                    <h2 class="flex-auto text-lg font-medium">{{ optional($route->user)->name }}</h2>
                                </div>
                                <p class="mt-3"></p>
                                <div class="flex py-4 text-sm text-gray-500">
                                    <div class="flex-1 inline-flex items-center space-betwen">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <p class="">{{ $route->depart }}</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <p class="">{{ $route->destination }}</p>
                                    </div>
                                </div>
                                <div class="flex-1 inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <p class="">{{ $route->date }}</p>
                                </div>
                                <div class="flex p-4 pb-2 border-t border-gray-200"></div>
                                <div class="flex space-x-3 text-sm font-medium">
                                    <div class="flex-auto flex space-x-3"></div>
                                    <form action="{{ route('reservations.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="route_id" value="{{ $route->id }}">
                                        <button class="mb-2 md:mb-0 bg-gray-900 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-gray-800" type="submit" aria-label="like">Réserver</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                @endforeach
        @else
            <p>No routes available for today.</p>
        @endif
            </div>
        </div>
    </div>
    @include('passager.sidebar')

    </div>
  

   
    
</x-app-layout>
