<x-app-layout>



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

      <h1>Mes Trajets</h1> 
      @foreach (auth()->user()->routes as $route)
         <div>
             <div>Date : {{ $route->date }}</div>
         </div>
         <div>
             <div>Depart : {{ $route->depart }}</div>
         </div>
         <div>
             <div>Destination : {{ $route->destination }}</div>
         </div>
         <hr>
     @endforeach 


    
 
</x-app-layout>
