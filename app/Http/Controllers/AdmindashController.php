<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class AdmindashController extends Controller
{
    public function AdminDashboard()
    {

        $driversCount = User::where('role', 'chauffeur')->count();
        $passengerCount = User::where('role', 'passager')->count();
        $ResrvationsCount = Reservation::count();

        return view('admin.home', [
            'driversCount' => $driversCount,
            'passengerCount' => $passengerCount,
            'ResrvationsCount' => $ResrvationsCount,
        ]);
    }
}
