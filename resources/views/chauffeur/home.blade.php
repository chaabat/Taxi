<x-app-layout>


    <div class="relative bg-gray-50 dark:bg-slate-900 w-full h-full pattern ">
      <section class="component rounded rounded-[20px] bg-yellow-400 p-10 mx-1 md:mx-10 border-4 border-dashed border-black " style="background-image: url({{asset('photos/chauffeur.png')}});">
   
              <blockquote class="relative text-white text-center p-10 w-full m-1">
          <div class="flex items-center justify-center p-12">
 
            <div class="mx-auto w-full max-w-[550px]">
              <form action="{{ route('routes.store') }}" method="post">
                  @csrf
                  <div class="flex flex-wrap items-center justify-between">
                      <!-- Departure -->
                      <div class="w-full sm:w-1/3 px-3">
                          <div class="mb-5">
                              <label for="depart" class="mb-3 block text-xl font-solid text-white font-mono">
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
                              <label for="destination" class="mb-3 block text-xl font-solid text-white font-mono">
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
                              <label for="date" class="mb-3 block text-xl font-solid text-white font-mono">
                                  Date
                              </label>
                              <input type="date" name="date" id="date" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                          </div>
                      </div>
                  </div>
                  
                  <!-- Search Button -->
                  <div class="w-full flex justify-center mt-5">
                      <button class="w-full hover:shadow-form rounded-md bg-yellow-400 py-3 px-8 text-center text-base font-momo font-bold text-black outline-none">
                          Ajouter
                      </button>
                  </div>
              </form>
          </div>
      </section>    

     
    
      <h1 class="text-4xl font-bold font-mono text-center my-8">Mes Trajets</h1>      
<div class="container mx-auto p-6 font-mono flex justify-end w-[80%]">
  
    <div class="justify-center grid grid-cols-1 gap-6 w-full sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">


        @foreach (auth()->user()->routes as $trajet)

      
        <div class="relative bg-yellow-400 py-6 px-6 rounded-3xl my-4 shadow-xl border-4 border-dashed border-black">
          <div class=" text-white flex items-center left-4 -top-6">
              <div class="flex items-center text-sm">
                <div class="relative w-16 h-16 mr-3 rounded-full md:block">
                <img src="{{ 'storage/' . $trajet->user->picture }}" class="object-cover w-full h-full rounded-full " alt="{{ $trajet->user->name }}">
                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                </div>
                <div>
                  <p class="font-bold text-xl text-black">{{ $trajet->user->name  }}</p>
                  <p class="text-m text-white font-bold">{{ $trajet->user->role  }}</p>
                </div>
              </div>
            </div>
            
            <div class="mt-8">
                <div class="flex space-x-3 text-black text-xl font-bold">
                  
                  <div class="flex-col justify-between items-center">
                    <img src="{{asset('photos/depart.png')}}" class="h-8 w-8" alt="">

                      <p> {{ $trajet->depart }} </p> 
                     
                    </div>
                    <hr class="mt-4 mb-4 border-t-2 border-yellow-500 border-dashed font-bold">
                    <div class="flex-col items-center">
                      <img src="{{asset('photos/destination.png')}}" class="h-8 w-8" alt="">

                      <p>{{ $trajet->destination }}</p> 
                  </div>
              </div>
              
                <div class="flex space-x-3 text-white font-bold text-xl my-3">
                
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                     <p>{{ $trajet->date }}</p> 
                </div>
                <hr class="mt-4 mb-4 border-t-2 border-black border-dashed font-bold">


                <div class="flex justify-between">
                    <div class="my-2">
                        <p class="font-bold text-base mb-2">Matricule  </p>
                        <div class="text-base text-white font-bold">
                            <p>{{ $trajet->user->matricule }}</p>
                        </div>
                    </div>
                     <div class="my-2">
                        <p class="font-bold text-base mb-2">Payment</p>
                        <div class="text-base text-white font-bold">
                            <p>{{ $trajet->user->payment }}</p>
                        </div>
                    </div>
                    <div class="my-2">
                      <p class="font-bold text-base mb-2">Vehicule</p>
                      <div class="text-base text-white font-bold">
                          <p>{{ $trajet->user->vehicule }}</p>
                      </div>
                  </div>
                </div>
            </div>
        </div>
        @endforeach 
    </div>
</div>



  

@include('chauffeur.sidebar')
</div>
    
 
</x-app-layout>
