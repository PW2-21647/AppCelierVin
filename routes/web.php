<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\Controller;
Use App\Http\Controllers\CellierController;
Use App\Http\Controllers\VinController;
use App\Http\Controllers\ScraperController;
Use App\Http\Controllers\Auth\AuthenticatedSessionController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/', [Controller::class, 'index']);
Route::get('accueil', [Controller::class, 'index']);

// Route de l'utilisateur
Route::group(['middleware' => 'auth'], function(){
    Route::get('dashboard', [CellierController::class, 'index'])->name('dashboard');

    Route::get('cellier/create', [CellierController::class, 'create'])->name('cellier.create');
    Route::post('cellier/create', [CellierController::class, 'store'])->name('cellier.store');
    Route::get('cellier/{cellier}', [CellierController::class, 'show'])->name('cellier.show');

    Route::get('ajout-bouteille', [VinController::class, 'create'])->name('bouteille.create');
    Route::post('ajout-bouteille', [VinController::class, 'store'])->name('bouteille.store');
    Route::get('cellier/{cellier}/fiche-bouteille/{bouteille}', [VinController::class, 'show'])->name('bouteille.show');
    Route::get('modifier-bouteille/{bouteille}', [VinController::class, 'edit'])->name('bouteille.edit');
    Route::put('modifier-bouteille/{bouteille}', [VinController::class, 'update'])->name('bouteille.update');
    Route::delete('modifier-bouteille/{bouteille}', [VinController::class, 'destroy'])->name('bouteille.delete');
});



#AutoComplete
Route::get('/autocomplete-search', function() {
    $query = request()->get('q');
    $results = DB::table('bouteilles')
        ->where('nom', 'like', '%' . $query . '%')
        ->orWhere('pays', 'like', '%' . $query . '%')
        ->orWhere('prix', 'like', '%' . $query . '%')
        ->orWhere('format', 'like', '%' . $query . '%')
        ->pluck('nom')
        ->toArray();
    return $results;
});

require __DIR__.'/auth.php';

/**
 * Gestion des routes administrative
 * Valide une connexion avec Middleware Auth
 * Valide si l'utilisateur est un admin
 * 
 * https://www.youtube.com/watch?v=kZOgH3-0Bko
 */
Route::group(['middleware' => 'auth'], function(){
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'permission',
    ], function(){   
        // Route pour l'administration
        Route::get('', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/scraper', [ScraperController::class, 'scraper'])->name('scraper.index');
    });
});
