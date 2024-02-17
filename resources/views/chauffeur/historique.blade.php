<x-app-layout>

        <div class="relative bg-gray-50 dark:bg-slate-900 w-full h-full pattern">
            <div class="container">
        <h1 class="text-4xl font-bold font-mono text-center my-8">Historique des réservations</h1>      

                <h2 class="text-xl font-bold font-mono text-center my-8">{{ $chauffeurs->name }}</h2>
                    @if($routes->isEmpty())
                        <p class="text-4xl font-bold font-mono text-center my-8">Aucune réservation trouvée pour vous.</p>
                    @else
                

                    @foreach($routes as $reservation)

                    <div class="border-4 border-dashed border-black max-w-md mx-auto bg-yellow-400 rounded-xl shadow-md overflow-hidden md:max-w-2xl m-5 flex flex-col md:flex-row justify-between items-start md:items-center">
                        <div class="md:flex-shrink-0">
                            <span class="text-l font-mono text-left text-black">Réservation le : </span>
                                <p class=" text-l font-mono text-left text-white">{{ $reservation->created_at }}</p>                 
                                       <img class="h-40 w-full rounded-full object-cover md:w-48" src="https://randomuser.me/api/portraits/men/1.jpg" alt="Event image">
                        </div>
                
                        <div class="flex  text-center mt-auto">
                        </div>
                        <div class="flex flex-col items-center md:items-start space-y-4 md:space-y-0">
                            <div class="flex items-center space-x-4">
                                <img src="{{asset('photos/depart.png')}}" class="h-8 w-8" alt="">
                                <p>{{ $reservation->depart }}</p> 
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="h-0.5 w-12 bg-black bg-dashed"></div> 
                                <img src="{{asset('photos/destination.png')}}" class="h-8 w-8" alt="">
                                <p>{{ $reservation->destination }}</p> 
                            </div>
                            
                        </div>
                       
                            <div class=" flex flex-col items-center space-y-4 md:mt-0 mt-4">
                               
                                <img src="{{asset('photos/star.png')}}" class="h-8 w-8"alt="">
                                       <h1>{{$reservation->avreage}}</h1>

                                       <div class="flex flex-col">  <span class="text-l font-mono text-left text-black">Date : </span>
                                        <p class=" text-l font-mono text-left text-white">{{ $reservation->date }}</p></div>
                                    </div>
                                    
                                </form>
                
                            </div>
                        </div>
                    </div>
                        
               @endforeach
           @endif
            </div>
        </div>
        @include('chauffeur.sidebar')
    </x-app-layout>
    
   