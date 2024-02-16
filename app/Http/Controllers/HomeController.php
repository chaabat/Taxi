<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;




class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $role = auth()->user()->role;
            if ($role == 'admin') {
                return redirect()->route('dashboard');
            } elseif ($role == 'passager') {
                $routes = collect();
                return view('passager.home', ['routes' => $routes]);
            } elseif ($role == 'chauffeur') {
                return view('chauffeur.home');
            }
        }
    }
}
