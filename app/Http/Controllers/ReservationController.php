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
    public function index()
    {
        // return view('')
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
        //trouver les routes disponibles
        $routes = Route::where([
            'date' => $request->date,
            'depart' => $request->depart,
            'destination' => $request->destination
        ])->get();

        //verifier si y a pas des routes
        if (is_null($routes))
            return back()->with('message', 'y a pas des routes pour le moment');

        //si y a des trajets et le chauffeur il a un statuts disponible

        $routesDisponible = null;
        $chauffeur = null;

        foreach ($routes as $route) {
            if ($route->user->statut == 'disponible') {
                $routesDisponible = $route;
                $chauffeur = $route->user;
                break;
            }
        }



        if (is_null($routesDisponible))
            return back()->with('message', 'y a pas des routes pour le moment');
        // reserver pour le passager le trajet disponible

        $reservation = Reservation::create([
            'date'        => $request->date,
            'depart'      => $request->depart,
            'destination' => $request->destination,
            'user_id'     => auth()->user()->id,
            'route_id'    => $routesDisponible->id

        ]);
        return back()->with('message', 'reservation est bien fait !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
           // Find the reservation
    $reservation = Reservation::findOrFail($id);

    // Access the associated route and chauffeur
    $route = $reservation->route;
    $chauffeur = $route->user;

    // Pass the reservation, route, and chauffeur to the view
    return view('reservation.show', compact('reservation', 'route', 'chauffeur'));
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
