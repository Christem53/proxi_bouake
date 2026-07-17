<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PrestataireController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PrestataireController as AdminPrestataireController;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Routes publiques
|--------------------------------------------------------------------------
*/


// Gestion des catégories (visible publiquement pour le moment)
Route::resource('categories', CategoryController::class);


// Page d'accueil du site
Route::get('/', function () {

    return view('home.index');

});




/*
|--------------------------------------------------------------------------
| Routes Administration
|--------------------------------------------------------------------------
*/


// Toutes les routes ici nécessitent :
// - un utilisateur connecté (auth)
// - le rôle admin (middleware admin)
// - la protection contre le cache navigateur (nocache)

Route::prefix('admin')
    ->middleware(['auth','admin','nocache'])
    ->group(function(){



        /*
        |--------------------------------------------------------------------------
        | Tableau de bord administrateur
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', function(){

            return view('admin.dashboard');

        })->name('admin.dashboard');





        /*
        |--------------------------------------------------------------------------
        | Gestion des catégories
        |--------------------------------------------------------------------------
        |
        | Crée automatiquement :
        | categories.index
        | categories.create
        | categories.store
        | categories.edit
        | categories.update
        | categories.destroy
        |
        */

        Route::resource('categories', CategoryController::class);





        /*
        |--------------------------------------------------------------------------
        | Gestion des utilisateurs
        |--------------------------------------------------------------------------
        */

        Route::resource('users', UserController::class);






        /*
        |--------------------------------------------------------------------------
        | Gestion des demandes prestataires
        |--------------------------------------------------------------------------
        |
        | Création automatique des routes :
        |
        | prestataires.index  => liste des demandes
        | prestataires.show   => voir une demande
        | prestataires.destroy => supprimer
        |
        */

        Route::resource('prestataires', AdminPrestataireController::class);





        /*
        |--------------------------------------------------------------------------
        | Actions accepter / refuser une demande
        |--------------------------------------------------------------------------
        */


        // Accepter un prestataire
        Route::post('/prestataires/{id}/accepter',
            [AdminPrestataireController::class,'accepter']
        )->name('prestataires.accepter');



        // Refuser un prestataire
        Route::post('/prestataires/{id}/refuser',
            [AdminPrestataireController::class,'refuser']
        )->name('prestataires.refuser');



    });






/*
|--------------------------------------------------------------------------
| Routes utilisateur connecté
|--------------------------------------------------------------------------
*/


Route::middleware(['auth','nocache'])->group(function(){



    /*
    |--------------------------------------------------------------------------
    | Dashboard client
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {

        return view('dashboard');

    })->middleware('verified')
      ->name('dashboard');





    /*
    |--------------------------------------------------------------------------
    | Profil utilisateur
    |--------------------------------------------------------------------------
    */


    Route::get('/profile',
        [ProfileController::class,'edit']
    )->name('profile.edit');



    Route::patch('/profile',
        [ProfileController::class,'update']
    )->name('profile.update');



    Route::delete('/profile',
        [ProfileController::class,'destroy']
    )->name('profile.destroy');






    /*
    |--------------------------------------------------------------------------
    | Demande pour devenir prestataire
    |--------------------------------------------------------------------------
    */


    // Affiche le formulaire
    Route::get('/devenir-prestataire',
        [PrestataireController::class,'create']
    )->name('prestataire.create');



    // Enregistre la demande
    Route::post('/devenir-prestataire',
        [PrestataireController::class,'store']
    )->name('prestataire.store');



});





/*
|--------------------------------------------------------------------------
| Authentification Breeze Laravel
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';