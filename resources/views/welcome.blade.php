<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TAXI</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="stylesheet" href="">
        <script src="https://cdn.tailwindcss.com"></script>


       
       
    </head>
    <body class="antialiased">
        @include('IncFiles.nav')
      


           
<section class="">
	<div class="bg-black text-white py-20">
		<div class="container mx-auto flex flex-col md:flex-row items-center my-12 md:my-24">
			<div class="flex flex-col w-full lg:w-1/3 justify-center items-start p-8">
				<h1 class="titre text-3xl md:text-5xl p-2 text-[#ffb703] tracking-loose ">Mon Grand</h1>
				<h2 class="text-3xl md:text-5xl leading-relaxed md:leading-snug mb-2">TAXI
				</h2>
				<p class="text-sm md:text-base text-gray-50 mb-4">Explore your favourite events and
					register now to showcase your talent and win exciting prizes.</p>
				
			</div>
			<div class="p-8 mt-12 mb-6 md:mb-0 md:mt-0 ml-0 md:ml-12 lg:w-2/3  justify-center">
				<div class="h-48 flex flex-wrap content-center">
					<div>
						<img class="inline-block h-[500px] rounded border-4 mt-22 hidden xl:block" src="{{asset('photos/2.jpg')}}"></div>
						
					</div>
				</div>
</section>

<div id="crud-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">

        <div class="relative bg-black rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
				<h2 class="font-semibold text-xl  text-[#ffb703] mb-4">Enregistrer en tant que</h2> 

                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
			<div class="flex flex-col items-center justify-center bg-[#ffb703] p-12"> 
                <img src="{{asset('photos/logoo.png')}}" class="h-[100px] " alt="">

				<div class="mt-3 md:flex md:items-center md:-mx-2">
					<a href="{{ route('registrePassager') }}" class="text-[#ffb703] bg-black focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex items-center">
						<div class="flex items-center">
							<img src="{{asset('photos/voyageur.png')}}" class="h-8 w-8" alt="">
							
							<span class="mx-2">
								Passager
							</span>
						</div>
					</a>
					<a href="{{ route('registreChauffeur') }}" class="text-[#ffb703] bg-black focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex items-center">
						<div class="flex items-center">
							<img src="{{asset('photos/taxi.png')}}" class="h-8 w-8" alt="">
							<span class="mx-2">
								Chauffeur
							</span>
						</div>
					</a>
				</div>
			</div>
			
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
                 
    </body>
</html>
