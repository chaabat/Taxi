<?php

namespace App\Http\Controllers;
use App\Models\Reservation;

use Illuminate\Http\Request;

class ReservController extends Controller
{
    public function index(){
        $reservations = Reservation::paginate(5);
        return view('admin.reservation', compact('reservations'));
    }
      
    public function delete(Request $request){
        $id = $request->id;
        $chauffeurs = Reservation::findOrFail($id);
    
        $chauffeurs->delete();
    return view('admin.reservation', compact('reservations'))->with('success', 'Profile deleted successfully');
    }
}
