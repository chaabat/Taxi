@extends('layouts.master')

@section('Addchauffeur')

<form method="POST" action="{{ route('registreChauffeur') }}" enctype="multipart/form-data">
    @csrf
    <div class="min-h-screen p-6 bg-black flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            <div>
                <h2 class="font-semibold text-xl text-[#ffb703]">Chauffeur </h2>

                <div class="bg-[#ffb703] rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="text-gray-600">
                            <p class="font-medium text-lg">Personal Details</p>
                            <p>Please fill out all the fields.</p>
                        </div>

                        <div class="lg:col-span-2">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                <div class="md:col-span-5">
                                    <label class="text-sm font-bold text-black tracking-wide" for="passager_name">Nom complet</label>
                                    <input type="text" name="name" id="passager_name" :value="old('name')" required autofocus autocomplete="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                                </div>
                                <div class="md:col-span-5">
                                    <label class="text-sm font-bold text-black tracking-wide" for="passager_email">Adresse e-mail</label>
                                    <input type="email" name="email" id="passager_email" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="email@domain.com" />
                                </div>
                                <div class="md:col-span-3">
                                    <label class="text-sm font-bold text-black tracking-wide" for="passager_password">Mot de passe</label>
                                    <input type="password" name="password" id="passager_password" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                                </div>
                                <div class="md:col-span-2">
                                    <label class="text-sm font-bold text-black tracking-wide" for="passager_password_confirmation">Confirmation du mot de passe</label>
                                    <input type="password" name="password_confirmation" id="passager_password_confirmation" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                                </div>
                                
                                <div class="md:col-span-3">
                                    <label class="text-sm font-bold text-black tracking-wide" for="">Vehicule</label>
                                    <select name="vehicule" id="vehicule" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50">
                                        <option value="Voiture">Voiture</option>
                                        <option value="Pick-up">Pick-up</option>
                                        <option value="Honda">Honda</option>
                                        <option value="Car">Car</option>
                                        <option value="Camion">Camion</option>
                                    </select>                              
                                    </div>
                                <div class="md:col-span-2">
                                    <label class="text-sm font-bold text-black tracking-wide" for="">Matricule</label>
                                    <input type="text" name="matricule" id="matricule" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="Matricule" />
                                </div>
                               
                                <div class="md:col-span-3">
                                    <label class="text-sm font-bold text-black tracking-wide" for="">Payment</label>
                                    <select name="payment" id="payment" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50">
                                        <option value="Especes">Especes</option>
                                        <option value="Carte">Carte</option>
                                    </select>                         
                                       </div>
                                <div class="md:col-span-2">
                                    <label class="text-sm font-bold text-black tracking-wide" for="statut">Statut</label>
                                    <select name="statut" id="statut" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50">
                                        <option value="disponible">disponible</option>
                                        <option value="indisponible">indisponible</option>
                                    </select>
                                </div>
                                
                                <div class="md:col-span-5">
                                    <label class="text-sm font-bold text-black tracking-wide" for="">Description</label>
                                    <textarea name="description" id="description" required autofocus autocomplete="description" class="h-32 border mt-1 rounded px-4 w-full bg-gray-50 resize-none"></textarea>
                                </div>
                                
                               
                                <div class="md:col-span-5">
                                    <label class="text-sm font-bold text-black tracking-wide">Joindre un document</label>
                                    <div class="flex items-center justify-center w-full">
                                        <label class="flex flex-col rounded-lg border-4 border-black border-dashed w-full h-60 p-10 group text-center">
                                            <div class="h-full w-full text-center flex flex-col items-center justify-center items-center  ">
                                                <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10">
                                                    <img class="has-mask h-36 object-center" src="{{asset('photos/logoo.png')}}" alt="freepik image">
                                                </div>
                                                <p class="pointer-none text-black"><span class="text-sm">Faites glisser et déposez ou sélectionnez un fichier sur votre ordinateur</span></p>
                                            </div>
                                            <input type="file" name="picture" class="hidden">
                                        </label>
                                    </div>
                                </div>
                                <input type="text" name="role" class="hidden" value="{{$role}}">
                                <div class="md:col-span-5 text-right">
                                    <div class="inline-flex items-end">
                                        <input type="submit" value="Ajouter" name="submit" class="bg-black text-[#ffb703] font-bold py-2 px-8 rounded mt-[10px]">
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    </div>
  </form>

@endsection
