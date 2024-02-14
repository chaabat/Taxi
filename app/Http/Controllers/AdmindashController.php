<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class AdmindashController extends Controller
{
    public function AdminDashboard()
    {

        $driversCount = User::count();
        $passengerCount = User::count();
        $ResrvationsCount = Reservation::count();
        $Resrvations = Reservation::all();

        return view('admin.dashbord', [
            'driversCount' => $driversCount,
            'passengerCount' => $passengerCount,
            'ResrvationsCount' => $ResrvationsCount,
            'Resrvations' => $Resrvations,
        ]);
    }
}
