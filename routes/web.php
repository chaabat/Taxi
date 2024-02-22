<?php

use App\Http\Controllers\AdmindashController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\ReservController;
use App\Http\Controllers\PassagerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Routes publiques accessibles sans authentification
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
// Authentification
require __DIR__ . '/auth.php';

// Routes nécessitant une authentification
Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard
    Route::get('/dashboard', [AdmindashController::class, 'AdminDashboard'])->name('dashboard');

    // Routes de gestion des réservations
    Route::resource('reservations', ReservationController::class);
    Route::post('/reserver/{route}', [ReservationController::class, 'reserver'])->name('reserver');
    Route::post('/reservations/{reservation}/rating', [ReservationController::class, 'ratingRoute'])->name('reservations.rating');
    Route::put('/reservations/{user}/update-statut', [ReservationController::class, 'updateStatut'])->name('update_statut');
    Route::get('/historique-passager', [ReservationController::class, 'historique'])->name('passager.historique');
    Route::get('/historique-chauffeur', [ReservationController::class, 'historiqueChauffeur'])->name('chauffeur.historique');
    Route::get('/favorits', [ReservationController::class, 'favorits'])->name('passager.favorits');
    Route::put('/reservations/{reservation}/update-favorit', [ReservationController::class, 'updateFavorit'])->name('update_favorit');
    Route::put('/reservations/{reservation}/update-rating', [ReservationController::class, 'updateRating'])->name('rating');
    Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
    Route::post('/reservations/{id}/commentaire', [ReservationController::class, 'commentaire'])->name('commentaire');



    // Routes de gestion des passagers
    Route::get('/passagers', [PassagerController::class, 'index'])->name('passager.index');
    Route::delete('/passagers/{id}/', [PassagerController::class, 'delete'])->name('passagers.delete');

    // Routes de gestion des chauffeurs
    Route::get('/chauffeurs', [ChauffeurController::class, 'index'])->name('chauffeur.index');
    Route::delete('/chauffeurs/{id}/', [ChauffeurController::class, 'delete'])->name('chauffeurs.delete');

    // Routes de gestion des réservations
    Route::resource('routes', RouteController::class);
    Route::post('/home', [RouteController::class, 'searchRoutes'])->name('routes.search');


    // Routes de gestion des réservations
    Route::get('/reservations', [ReservController::class, 'index'])->name('reservation.index');
    Route::delete('/reservations/{id}/', [ReservController::class, 'delete'])->name('reservation.delete');
});
