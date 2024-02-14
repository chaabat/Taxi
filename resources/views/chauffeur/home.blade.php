<x-app-layout>


    <div class="relative bg-gray-50 dark:bg-slate-900 w-full h-full pattern ">

    <div class="flex items-center justify-center p-12">
 
        <div class="mx-auto w-full max-w-[550px]">
            <form action="{{ route('routes.store') }}" method="post">
                @csrf
            <div class="-mx-3 flex flex-wrap">
              <div class="w-full px-3 sm:w-1/2">
                <div class="mb-5">
                  <label
                 
                    class="mb-3 block text-base font-medium text-[#07074D]"
                  >
                    Départ
                  </label>
                 <select name="depart" id="" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" >
                    <option value="hay wrida 1">hay wrida 1</option>
                  <option value="hay wrida 2">hay wrida 2</option>
                  <option value="kores">kores</option>
                  <option value="medina">medina</option>
                  <option value="hay anas">hay anas</option>
                  <option value="jrayfat">jrayfat</option>
                 </select>
                </div>
              </div>
              <div class="w-full px-3 sm:w-1/2">
                <div class="mb-5">
                  <label
                    
                    class="mb-3 block text-base font-medium text-[#07074D]"
                  >
                  Destination
                  </label>
                  <select name="destination" id="" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" >
                    <option value="hay wrida 1">hay wrida 1</option>
                    <option value="hay wrida 2">hay wrida 2</option>
                    <option value="kores">kores</option>
                    <option value="medina">medina</option>
                    <option value="hay anas">hay anas</option>
                    <option value="jrayfat">jrayfat</option>
                 </select>
                </div>
              </div>
            </div>
         
      
            <div class="-mx-3 flex flex-wrap">
              <div class="w-full px-3 sm:w-1/2">
                <div class="mb-5">
                  <label
                    for="date"
                    class="mb-3 block text-base font-medium text-[#07074D]"
                  >
                    Date
                  </label>
                  <input
                    type="date"
                    name="date"
                    id="date"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                  />
                </div>
              </div>
            
             
            </div>
      
            <div class=" items-center">
              <button name="submit" type="submit"
                class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none "
              > 
                Submit
              </button>
            </div>
          </form>
        </div>
      </div>

     

   
    
      <h1 class="text-4xl font-bold text-center my-8">Mes Trajets</h1>      
<div class="flex items-center justify-center">
  
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4">


        @foreach (auth()->user()->routes as $trajet)

      
        <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl">
            <div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-yellow-500 left-4 -top-6">
              
                <img src="{{ 'storage/' . $trajet->user->picture }}" class="h-12 " alt="{{ $trajet->user->name }}">
            </div>
            <div class="mt-8">
                <p class="text-xl font-semibold my-2">{{ $trajet->user->name }}</p>
                <div class="flex space-x-3 text-gray-600 text-sm">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                     <p> {{ $trajet->depart }} </p> 
                </div>
                <hr class="mt-4 mb-4 border-t-2 border-yellow-500 border-dashed font-bold">

                <div class="flex space-x-3 text-black text-sm">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                     <p>{{ $trajet->destination }}</p> 
                </div>
                <div class="flex space-x-3 text-black text-sm my-3">
                
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                     <p>{{ $trajet->date }}</p> 
                </div>
                <hr class="mt-4 mb-4 border-t-2 border-yellow-500 border-dashed font-bold">


                <div class="flex justify-between">
                    <div class="my-2">
                        <p class="font-semibold text-base mb-2">Matricule  </p>
                        <div class="text-base text-gray-400 font-semibold">
                            <p>{{ $trajet->user->matricule }}</p>
                        </div>
                    </div>
                     <div class="my-2">
                        <p class="font-semibold text-base mb-2">Payment</p>
                        <div class="text-base text-gray-400 font-semibold">
                            <p>{{ $trajet->user->payment }}</p>
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
