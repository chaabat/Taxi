<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validated = $request->validate([
            'depart' => 'required',
            'destination' => 'required',
            'date' => 'required|date',
            'action' => 'nullable',
            'reservation_id' => 'nullable',

        ]);

        // Create the route
        $route = new Route();
        $route->depart = $request->depart;
        $route->destination = $request->destination;
        $route->date = $request->date;
        $route->action = $request->action; 
        $route->reservation_id = $request->reservation_id;
        $route->save();

        // Redirect back with success message
        return redirect()->route('chauffeur.home')->with('success', 'Route added successfully.');
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
}
