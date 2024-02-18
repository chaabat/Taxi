@extends('layouts.master')

@section('AddPassager')

<form method="POST" action="{{ route('registrePassager') }}" enctype="multipart/form-data">
    @csrf
    <div class="min-h-screen p-6 bg-black flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            <div>
                <h2 class="font-semibold text-xl text-[#ffb703]">Passager</h2>

                <div class="bg-[#ffb703] rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="text-gray-600">
                            <p class="font-medium text-lg">Personal Details</p>
                            <p>Please fill out all the fields.</p>
                        </div>

                        <div class="lg:col-span-2">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                <div class="md:col-span-5">
                                    <label class="text-sm font-bold text-black  tracking-wide" for="">Full Name</label>
                                    <input type="text" name="name" id="name" :value="old('name')" required autofocus autocomplete="name" 
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                                        </div>

                                        
                                <div class="md:col-span-5">
                                    <label class="text-sm font-bold text-black  tracking-wide" for="">Email Address</label>
                                    <input type="email" name="email" id="email"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                                        placeholder="email@domain.com" />
                                </div>

                                <div class="md:col-span-3">
                                    <label class="text-sm font-bold text-black  tracking-wide" for="">Password</label>
                                    <input type="password" name="password" id="password"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                                        placeholder="" />
                                </div>
                                <div class="md:col-span-2">
                                  <label class="text-sm font-bold text-black  tracking-wide" for="">Confirmation Password</label>
                                  <input type="password" name="password_confirmation" id="password"
                                      class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                                      placeholder="" />
                              </div>

                                <div class="md:col-span-3">
                                    <label class="text-sm font-bold text-black  tracking-wide" for="">Phone</label>
                                    <input type="number" name="phone" id="phone"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                                        placeholder="" />
                                </div>

                                <div class="md:col-span-5">
                                  <label class="text-sm font-bold text-black  tracking-wide">Attach Document</label>
                      <div class="flex items-center justify-center w-full">
                        <label class="flex flex-col rounded-lg border-4 border-black border-dashed w-full h-60 p-10 group text-center">
                          <div class="h-full w-full text-center flex flex-col items-center justify-center items-center  ">
                               
                                  <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10">
                                  <img class="has-mask h-36 object-center" src="{{asset('photos/logoo.png')}}" alt="freepik image">
                                  </div>
                                  <p class="pointer-none text-black  "><span class="text-sm">Drag and drop  or select a file from your computer</p>
                              </div>
                              <input type="file" name="picture" class="hidden">
                          </label>
                      </div>

                                <input type="text" name="role" class="hidden" value="{{$role}}">
                                <div class="md:col-span-5 text-right">
                              <div class="inline-flex items-end">
                             <input type="submit" value="ajouter" name="submit" class="bg-black text-[#ffb703] font-bold py-2 px-8 rounded mt-[10px]">
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
