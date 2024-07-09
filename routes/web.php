<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\Admin\SiteController as AdminSiteController;
use App\Http\Controllers\Admin\DemandeInterventionController as AdminDemandeInterventionController;
use App\Http\Controllers\Admin\UtilisateurController as AdminUtilisateurController;
use App\Http\Controllers\Admin\PrestataireController as AdminPrestataireController;
use App\Http\Controllers\Admin\ZoneController as AdminZoneController;
use App\Http\Controllers\Admin\BonTravailController as AdminBonTravailController;
use App\Http\Controllers\Admin\PieceController as AdminPieceController;
use App\Http\Controllers\Admin\EquipementController as AdminEquipementController;
use App\Http\Controllers\Admin\ForfaitContratController as AdminForfaitContratController;


use App\Http\Controllers\Demandeur\SiteController as DemandeurSiteController;
use App\Http\Controllers\Demandeur\DemandeInterventionController as DemandeurDemandeInterventionController;



use App\Http\Controllers\Prestataire\DemandeInterventionController as PrestataireDemandeInterventionController;
use App\Http\Controllers\Prestataire\RapportConstatController as PrestataireRapportConstatController;
use App\Http\Controllers\Prestataire\RapportRemplacementPieceController as PrestataireRapportRemplacementPieceController;
use App\Http\Controllers\Prestataire\UtilisateurController as PrestataireUtilisateurController;
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

Route::get("/init", [AppController::class, 'init'])->name('app.init');

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

/**
 * **************************************************************************************************
 * **************************************************************************************************
 * **************************************************************************************************
 *      ADMIN ROUTES
 */
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'isnotblocked'
])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('/demandes', AdminDemandeInterventionController::class);

    Route::post('/demandes/rapport-intervention/{rapportIntervention}/cloture', [AdminDemandeInterventionController::class, 'cloture'])
        ->name('demandes.cloture');

    Route::post('/demandes/injection-piece/rapport-intervention/{rapportIntervention}', [AdminDemandeInterventionController::class, 'injection'])
        ->name('demandes.injection');

    Route::put('/rapportIntervention/injection-Piece/{injectionPiece}', [AdminDemandeInterventionController::class, 'injection_update'])
        ->name('demandes.injection-update');

    Route::resource('/sites', AdminSiteController::class);

    Route::post('/sites/{site}/equipement/store', [AdminSiteController::class, 'add_equipement'])
        ->name('sites.equipement.store');

    Route::get('/sites/{site}/{categorie_equipement}', [AdminSiteController::class, 'show_categorie_equipement'])
    ->name('sites.equipement.categorie');
    
    Route::get('/sites/{site}/equipement/{equipement}', [AdminEquipementController::class, 'edit'])
        ->name('sites.equipement.edit');

    Route::put('/sites/{site}/equipement/{equipement}', [AdminEquipementController::class, 'update'])
        ->name('sites.equipement.update');
        
    Route::delete('/sites/{site}/equipement/{equipement}', [AdminEquipementController::class, 'destroy'])
        ->name('sites.equipement.destroy');

    Route::resource('/utilisateurs', AdminUtilisateurController::class);
    Route::patch('/utilisateurs/{utilisateur}/status', [AdminUtilisateurController::class, 'status'])->name('utilisateurs.status');

    Route::resource('/prestataires', AdminPrestataireController::class);
    Route::post('/prestataires/{prestataire}/create-admin', [AdminPrestataireController::class, 'create_admin'])->name('prestataires.create_admin');
    Route::post('/prestataires/{prestataire}/create-agent', [AdminPrestataireController::class, 'create_agent'])->name('prestataires.create_agent');

    Route::resource('/zones', AdminZoneController::class);
    Route::resource('/pieces', AdminPieceController::class);
    Route::resource('/bon-travail', AdminBonTravailController::class);

    Route::get('forfaits', [AdminForfaitContratController::class, 'index'])->name('forfaits.index');
    Route::put('forfaits/{id}/validate', [AdminForfaitContratController::class, 'validateForfait'])->name('forfaits.validate');
    Route::get('forfaits/{year}/{month}', [AdminForfaitContratController::class, 'getForfaitsByMonth'])->name('forfaits.byMonth');
});



/**
 * **************************************************************************************************
 * **************************************************************************************************
 * **************************************************************************************************
 *      DEMANDEUR ROUTES
 */
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'isnotblocked'
])->prefix('demandeur')->name('demandeur.')->group(function () {

    Route::get('/dashboard', function () {
        return view('demandeur.dashboard');
    })->name('dashboard');

    Route::resource('/demandes', DemandeurDemandeInterventionController::class);
    Route::resource('/sites', DemandeurSiteController::class);

    Route::post('/sites/{site}/equipement/store', [DemandeurSiteController::class, 'add_equipement'])
        ->name('sites.equipement.store');

    Route::get('/sites/{site}/{categorie_equipement}', [DemandeurSiteController::class, 'show_categorie_equipement'])
        ->name('sites.equipement.categorie');

    Route::get('/sites/{id}/{type_equipement}', function () {
        return view('demandeur.sites.equipements');
    })->name('sites.type_equipement');
});



/**
 * **************************************************************************************************
 * **************************************************************************************************
 * **************************************************************************************************
 *      PRESTATAIRE ROUTES
 */
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'isnotblocked'
])->prefix('prestataires')->name('prestataires.')->group(function () {

    Route::get('/dashboard', function () {
        return view('prestataires.dashboard');
    })->name('dashboard');

    Route::resource('/demandes', PrestataireDemandeInterventionController::class);
    Route::post('/utilisateurs', [PrestataireUtilisateurController::class, 'store'])->name('utilisateurs.store');
    Route::get('/utilisateurs', [PrestataireUtilisateurController::class, 'index'])->name('utilisateurs.index');
    Route::get('/utilisateurs/{utilisateur}', [PrestataireUtilisateurController::class, 'show'])->name('utilisateurs.show');

    Route::post('/demandes/{demande}/{bonTravail}/rapport-constat', [PrestataireRapportConstatController::class, 'store'])
        ->name('demandes.rapport_constat.store');

        Route::post('/demandes/{demande}/{bonTravail}/rapport-remplacement', [PrestataireRapportRemplacementPieceController::class, 'store'])
            ->name('demandes.rapport_remplacement.store');

});



Route::prefix('prestataires')->name('prestataires.')->group(function () {
    Route::get('/dashboard', function () {
        return view('prestataires.dashboard');
    })->name('dashboard');
});

