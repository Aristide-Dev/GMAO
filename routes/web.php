<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
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

Route::get("/init", [AppController::class,'init'])->name('app.init');

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::prefix('demandeur')->name('demandeur.')->group(function() {
    Route::get('/dashboard', function () {
        return view('demandeur.dashboard');
    })->name('dashboard');

    Route::get('/demandes', function () {
        return view('demandeur.demandes.index');
    })->name('demandes.index');

    Route::get('/demandes/{id}', function () {
        return view('demandeur.demandes.show');
    })->name('demandes.show');

    Route::get('/sites', function () {
        return view('demandeur.sites.index');
    })->name('sites.index');

    Route::get('/sites/{id}', function () {
        return view('demandeur.sites.show');
    })->name('sites.show');

    Route::get('/sites/{id}/{type_equipement}', function () {
        return view('demandeur.sites.equipements');
    })->name('sites.type_equipement');
});



Route::prefix('prestataires')->name('prestataires.')->group(function() {
    Route::get('/dashboard', function () {
        return view('prestataires.dashboard');
    })->name('dashboard');

    Route::get('/demandes', function () {
        return view('prestataires.demandes.index');
    })->name('demandes.index');

    Route::get('/demandes/{id}', function () {
        return view('prestataires.demandes.show');
    })->name('demandes.show');

    Route::get('/utilisateurs', function () {
        return view('prestataires.utilisateurs.index');
    })->name('utilisateurs.index');

    Route::get('/utilisateurs/{id}', function () {
        return view('prestataires.utilisateurs.show');
    })->name('utilisateurs.show');
});



Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/demandes', function () {
        return view('admin.demandes.index');
    })->name('demandes.index');

    Route::get('/demandes/{id}', function () {
        return view('admin.demandes.show');
    })->name('demandes.show');

    Route::get('/sites', function () {
        return view('admin.sites.index');
    })->name('sites.index');

    Route::get('/sites/{id}', function () {
        return view('admin.sites.show');
    })->name('sites.show');

    Route::get('/sites/{id}/{type_equipement}', function () {
        return view('admin.sites.equipements');
    })->name('sites.type_equipement');

    Route::get('/prestataires', function () {
        return view('admin.prestataires.index');
    })->name('prestataires.index');

    Route::get('/prestataires/create', function () {
        return view('admin.prestataires.create');
    })->name('prestataires.create');

    Route::get('/prestataires/{id}', function () {
        return view('admin.prestataires.show');
    })->name('prestataires.show');

    Route::get('/utilisateurs', function () {
        return view('admin.utilisateurs.index');
    })->name('utilisateurs.index');

    Route::get('/utilisateurs/{id}', function () {
        return view('admin.utilisateurs.show');
    })->name('utilisateurs.show');

    Route::get('/stock', function () {
        return view('admin.stock.index');
    })->name('stock.index');

    Route::get('/stock/{id}', function () {
        return view('admin.stock.show');
    })->name('stock.show');

    Route::get('/pieces', function () {
        return view('admin.pieces.index');
    })->name('pieces.index');

    Route::get('/equipements', function () {
        return view('admin.equipements.index');
    })->name('equipements.index');

    Route::get('/equipements/{id}', function () {
        return view('admin.equipements.show');
    })->name('equipements.show');
});
