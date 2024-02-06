<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $role = auth()->user()->role;
            if ($role == 'admin') {
                return view('admin.dashboard');
            } elseif ($role == 'passager') {
                return view('passager.home');
            } else {
                return view('chauffeur.home');
            }
        }
    }
}

