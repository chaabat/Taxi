<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Route;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $role = auth()->user()->role;
            if ($role == 'admin') {
                return view('admin.dashboard');
            } elseif ($role == 'passager') {
                $routes = collect();
                return view('passager.home', ['routes' => $routes]);
            } elseif ($role == 'chauffeur') {
                return view('chauffeur.home');
            }
        }
    }
}
