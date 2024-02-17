<?php

use App\Http\Controllers\AdmindashController;
use App\Http\Controllers\navController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use \App\Http\Controllers\ReservationController;
use \App\Http\Controllers\HistoriqueController;
use App\Http\Controllers\PassagerController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\ReservController;
use \App\Http\Controllers\RouteController;
use App\Http\Middleware\Chauffeur;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

use function Laravel\Prompts\search;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashbord', [AdmindashController::class, 'AdminDashboard'])->name('dashboard');

require __DIR__ . '/auth.php';


// Reservations
Route::resource('reservations', ReservationController::class);
Route::post('/routes/search', [ReservationController::class, 'store'])->name('routes.search');
Route::post('/reserver/{route}', [ReservationController::class, 'reserver'])->name('reserver');




Route::post('/reservations/{reservation}/rating', [ReservationController::class, 'ratingRoute'])->name('reservations.rating');
//Routes
Route::resource('routes', RouteController::class);
Route::post('/routes/search', [RouteController::class, 'searchRoutes'])->name('routes.search');


Route::put('/reservations/{user}/update-statut', [ReservationController::class, 'updateStatut'])->name('update_statut');




Route::get('/historique', function () {
    return view('chauffeur.historique');
})->name('historique.cha');


Route::get('/passagers', [PassagerController::class, 'index'])->name('passager.index');

Route::delete('/passagers/{id}/', [PassagerController::class, 'delete'])->name('passagers.delete');

Route::get('/chauffeurs', [ChauffeurController::class, 'index'])->name('chauffeur.index');

Route::delete('/chauffeurs/{id}/', [ChauffeurController::class, 'delete'])->name('chauffeurs.delete');


Route::get('/reservations', [ReservController::class, 'index'])->name('reservation.index');
Route::get('/historique-passager', [ReservationController::class, 'historique'])->name('passager.historique');
Route::get('/historique-chauffeur', [ReservationController::class, 'historiqueChauffeur'])->name('chauffeur.historique');

Route::get('/favorits', [ReservationController::class, 'favorits'])->name('passager.favorits');


Route::delete('/reservations/{id}/', [ReservController::class, 'delete'])->name('reservation.delete');

Route::put('/reservations/{reservation}/update-favorit', [ReservationController::class, 'updateFavorit'])->name('update_favorit');
Route::put('/reservations/{reservation}/update-rating', [ReservationController::class, 'updateRating'])->name('rating');
