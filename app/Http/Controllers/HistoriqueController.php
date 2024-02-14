<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoriqueController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $reservations = $user->reservations()->with('route.user')->get();

        return view('passager.historique', compact('reservations'));
    }
}
