<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\User;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(User $user)
    {
        if (Auth::check()) {
            $role = auth()->user()->role;
            if ($role == 'admin') {
                return redirect()->route('dashboard');
            } elseif ($role == 'passager') {
                $today = Carbon::today()->toDateString();

                $routes = Route::whereDate('date', '=', $today)->get();

                return view('passager.home', ['routes' => $routes]);
            } elseif ($role == 'chauffeur') {
                return view('chauffeur.home', compact('user'));
            }
        }
    }
}
