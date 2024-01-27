<?php

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

    Route::get('/sites', function () {
        return view('prestataires.sites.index');
    })->name('sites.index');

    Route::get('/sites/{id}', function () {
        return view('prestataires.sites.show');
    })->name('sites.show');
});
