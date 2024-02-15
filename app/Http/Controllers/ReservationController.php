<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Route;
use App\Models\Reservation;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('passager.home');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $routes = Route::where('id', $request->id)->get();
    
        if ($routes->isEmpty()) {
            return back()->with('message', 'Aucune route disponible pour le moment.');
        }
    
        $routeDisponible = null;
    
        foreach ($routes as $route) {
            if ($route->user->statut == 'disponible') {
                $routeDisponible = $route;
                break;
            }
        }
    
        if (is_null($routeDisponible)) {
            return back()->with('message', 'Aucune route disponible avec un chauffeur disponible.');
        }
    
        $reservation = Reservation::create([
            'date' => $route->date,
            'depart' => $route->depart,
            'destination' => $route->destination,
            'user_id' => auth()->user()->id,
            'route_id' => $route->id
        ]);
    }
    
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function ratingRoute(Request $request , Reservation $reservation){
        $reservation->rating = $request->rating;
        $reservation->save();
        return back();
    }

  
    
    
}
