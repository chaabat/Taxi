<?php

namespace App\Http\Controllers;

use App\Models\ChauffeurPassager;
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
        $routesDisponibles = Route::where('date', $request->date)
            ->where('depart', $request->depart)
            ->where('destination', $request->destination)
            ->whereHas('user', function ($query) {
                $query->where('statut', 'disponible');
            })
            ->get();

        // Vérifier si des routes sont disponibles
        if ($routesDisponibles->isEmpty()) {
            return back()->with('message', 'Aucune route disponible pour le moment.');
        }

        // Sélectionner la première route disponible
        $routeDisponible = $routesDisponibles->first();

        // Créer la réservation pour le passager sur la route disponible
        $reservation = Reservation::create([
            'date' => $request->date,
            'depart' => $request->depart,
            'destination' => $request->destination,
            'user_id' => auth()->user()->id,
            'route_id' => $routeDisponible->id
        ]);

        return redirect()->route('passager.historique')->with('message', 'La réservation a été effectuée avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
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
    try {
        $reservation = Reservation::findOrFail($id);
        
        if ($reservation->user_id != auth()->user()->id) {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à supprimer cette réservation.');
        }
        
        $reservation->delete();
        
        return redirect()->route('passager.historique')->with('success', 'La réservation a été supprimée avec succès.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la suppression de la réservation.');
    }
}
    
    




    public function reserver(Route $route)
    {
        try {
            $user = auth()->user();

            Reservation::create([
                'user_id' => $user->id,
                'date' => $route->date,
                'depart' => $route->depart,
                'destination' => $route->destination,
                'route_id' => $route->id,
            ]);

            $chauffeurId = $route->user_id;

            ChauffeurPassager::create([
                'chauffeur_id' => $chauffeurId,
                'passager_id' => $user->id,
                'route_id' => $route->id,
            ]);

            return redirect()->route('passager.historique')->with('message', 'La réservation a été effectuée avec succès!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to make reservation.');
        }
    }

    public function historique()
    {

        $reservations = auth()->user()->reservations;

        return view('passager.historique', ['reservations' => $reservations]);
    }



    public function favorits()
    {
        $favoritReservations = Reservation::where('user_id', auth()->id())
            ->where('favorits', 1)
            ->get();

        return view('passager.favorits', ['favoritReservations' => $favoritReservations]);
    }

    public function updateFavorit(Request $request, Reservation $reservation)
    {
        $favorits = $reservation->favorits == '0' ? '1' : '0';

        $reservation->update([
            'favorits' => $favorits,
        ]);

        return back()->with('success', 'Favorit updated successfully.');
    }

    public function updateRating(Request $request, Reservation $reservation)
    {
        $rating = $request->input('rating');

        $reservation->update([
            'rating' => $rating,
        ]);

        return back()->with('success', 'Rating updated successfully.');
    }


    public function historiqueChauffeur()
    {
        $chauffeurs = auth()->user();

        $routes = Route::where('user_id', $chauffeurs->id)
            ->whereHas('reservations')
            ->with(['reservations.passager'])
            ->get();

        return view('chauffeur.historique', ['routes' => $routes, 'chauffeurs' => $chauffeurs]);
    }


    public function updateStatut(Request $request, $user)
    {
        $newStatut = $request->input('statut');

        $user = User::findOrFail($user);

        $user->update([
            'statut' => $newStatut,
        ]);

        return redirect()->back()->with('status', 'Statut updated successfully.');
    }


    public function commentaire(Request $request, $id)
    {
        $request->validate([
            'commentaire' => 'required|string|max:255', 
        ]);

        $reservation = Reservation::findOrFail($id);

        $reservation->commentaire = $request->commentaire;
        $reservation->save();

        return redirect()->back()->with('success', 'Comment added successfully.');
    }
}



   

