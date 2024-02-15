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
        $routes = Route::where('id', $request->id)->get();

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
        return redirect()->route('passager.historique')->with('message', 'La réservation a été effectuée avec succès!');
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


    public function ratingRoute(Request $request, Reservation $reservation)
    {
        $reservation->rating = $request->rating;
        $reservation->save();
        return back();
    }

    public function reserver( Route $route)
    {
        try {
            // Get the authenticated user
            $user = auth()->user();

            // Create a new reservation record
            Reservation::create([
                'user_id' => $user->id,
                'date' => $route->date,
                'depart' => $route->depart,
                'destination' => $route->destination,
                'route_id' => $route->id,
            ]);

            return redirect()->route('passager.historique')->with('message', 'La réservation a été effectuée avec succès!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to make reservation.');
        }
    }

    public function historique() {

    // Get the authenticated user's reservations
    $reservations = auth()->user()->reservations;

    // Pass the reservations to the view
    return view('passager.historique', ['reservations' => $reservations]);
    }   
 }

