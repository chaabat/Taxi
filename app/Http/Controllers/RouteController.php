<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // Get today's date
        $today = Carbon::today()->toDateString();

        // Retrieve routes with today's date
        $routes = Route::whereDate('date', $today)->get();



        return view('passager.home', ['routes' => $routes]);
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('chauffeur.home');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Route::create([
            'date' => $request->date,
            'depart' => $request->depart,
            'destination' => $request->destination,
            'user_id' => auth()->user()->id,
        ]);
        return back()->with('message', 'vous avez creer un trajet !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

    public function searchRoutes(Request $request)
    {
        $depart = $request->input('depart');
        $destination = $request->input('destination');
        $date = $request->input('date');
        $vehicule = $request->input('vehicule');
        $routes = Route::where('depart', $depart)
            ->where('destination', $destination)
            ->whereDate('date', $date)
            ->whereHas('user', function ($query) use ($vehicule) {
                $query->where('role', 'chauffeur')->where('vehicule', $vehicule)->where('statut', 'disponible');
            })
            ->get();

        return view('passager.home', ['routes' => $routes]);
    }
}
