<?php

namespace App\Http\Controllers;
use App\Models\Route;
    use Carbon\Carbon;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
{
    // Get today's date
    $today = Carbon::today()->toDateString();

    // Retrieve routes with today's date
    $routes = Route::whereDate('date', $today)->get();
    

    return view('passager.search', ['routes' => $routes]);
}
}
