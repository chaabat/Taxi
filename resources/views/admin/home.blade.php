<x-app-layout>
   


<section class=" mx-auto bg-white font-mono flex justify-center mt-12">
  <div class="w-[80%]  bg-yellow-400 h-[250px] overflow-hidden rounded-lg shadow-lg">
  <h4 class="text-3xl text-center ">Statéstiques</h4>
  <div class="flex flex-col lg:flex-row items-center gap-5 mt-12">
    <div
    class="flex justify-evenly items-center w-96 lg:w-1/3 p-3 m-3 border-4 border-dashed border-black rounded">
    <img src="{{asset('photos/chauffeur.png')}}" class="h-16 w-16" alt="">

      <div class="text-center">
        <h2 class="text-4xl font-bold pb-2">{{$driversCount}}</h2>
        <h4 class="inline text-white text-xl">Chauffeurs</h4>
      </div>
    </div>
    <div
       class="flex justify-evenly items-center w-96 lg:w-1/3 p-3 m-3 border-4 border-dashed border-black rounded">

     <img src="{{asset('photos/passager.png')}}" class="h-16 w-16" alt="">
      <div class="text-center">
        <h2 class="text-4xl font-bold pb-2">{{$passengerCount}}</h2>
        <h4 class="inline text-white text-xl">Passagers</h4>
      </div>
    </div>
    <div
       class="flex justify-evenly items-center w-96 lg:w-1/3 p-3 m-3 border-4 border-dashed border-black rounded">

       <img src="{{asset('photos/reservation.png')}}" class="h-16 w-16" alt="">

      <div class="text-center">
        <h2 class="text-4xl font-bold pb-2">{{$ResrvationsCount}}</h2>
        <h4 class="inline text-white text-xl">Réservations</h4>
      </div>
    </div>
  </div>
</section>




@include('admin.sidebar')

    </div>

</x-app-layout>
