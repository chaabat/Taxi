@extends('layouts.master')

@section('login')
<div class="w-full min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" style="background-image: url('{{ asset('photos/login.jpg') }}'); background-size: cover; background-repeat: no-repeat;">
   <a href=""><img  src="{{ asset('photos/logoo.png') }}" alt="Logo"></a> 

    <div class="w-full sm:max-w-md p-5 mx-auto">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 text-[#ffb703]" for="email">Email-Address</label>
                <input id="email" type="text" name="email" class="py-2 px-3 border border-[#ffb703] focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" value="{{ old('email') }}" required autofocus autocomplete="username" />
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 text-[#ffb703]" for="password">Mot de passe</label>
                <input id="password" type="password" name="password" class="py-2 px-3 border border-bg-[#ffb703] focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" required autocomplete="current-password" />
                @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6 flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" class="border border-bg-[#ffb703] text-[#ffb703] shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50" name="remember" />
                    <span class="ms-2 text-sm text-[#ffb703]">{{ __('Remember me') }}</span>
                </div>
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-[#ffb703]"> Forgot your password? </a>
                @endif
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 bg-[#ffb703] border border-transparent rounded-md font-semibold capitalize text-white  focus:outline-none disabled:opacity-25 transition">Connexion</button>
            </div>
            <div class="mt-6 text-center">
                <a href="#" class="underline">Sign up for an account</a>
            </div>
        </form>
    </div>
</div>
@endsection


