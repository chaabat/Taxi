<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Route;

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
        //get form data
        $date = $request->date;
        $depart = $request->depart;
        $destination = $request->destination;

        //search for driver
        $drivers = User::where('role' , 'chauffeur')->get();
        $routes = Route::where([
            'depart'      => $depart,
            'destination' => $destination,
            'date'        => $date,
        ])->get();

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
