<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PrestataireController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PrestationsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PrestataireController as AdminPrestataireController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceController;


use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Routes publiques
|--------------------------------------------------------------------------
*/


// Page vitrine ProxiBouaké
Route::get('/', 
    [HomeController::class,'index']
)->name('home');

Route::get('/recherche',
    [HomeController::class,'search']
)->name('search');



// Catégories publiques
Route::resource('categories', CategoryController::class);







/*
|--------------------------------------------------------------------------
| Routes Administration
|--------------------------------------------------------------------------
*/


Route::prefix('admin')
    ->middleware(['auth','admin','nocache'])
    ->group(function(){



        /*
        |--------------------------------------------------------------------------
        | Dashboard Admin
        |--------------------------------------------------------------------------
        */


        Route::get('/dashboard', function(){

            return view('admin.dashboard');

        })->name('admin.dashboard');







        /*
        |--------------------------------------------------------------------------
        | Gestion prestations
        |--------------------------------------------------------------------------
        */


        Route::get('/prestations',
            [AdminPrestataireController::class,'prestations']
        )->name('admin.prestations.index');



        Route::post('/prestations/{id}/accepter',
            [AdminPrestataireController::class,'accepterPrestation']
        )->name('admin.prestations.accepter');



        Route::post('/prestations/{id}/refuser',
            [AdminPrestataireController::class,'refuserPrestation']
        )->name('admin.prestations.refuser');



        Route::post('/prestations/{id}/desactiver',
            [AdminPrestataireController::class,'desactiverPrestation']
        )->name('admin.prestations.desactiver');



        Route::post('/prestations/{id}/reactiver',
            [AdminPrestataireController::class,'reactiverPrestation']
        )->name('admin.prestations.reactiver');









        /*
        |--------------------------------------------------------------------------
        | Gestion catégories
        |--------------------------------------------------------------------------
        */


        Route::resource('categories', CategoryController::class);








        /*
        |--------------------------------------------------------------------------
        | Gestion utilisateurs
        |--------------------------------------------------------------------------
        */


        Route::resource('users', UserController::class);









        /*
        |--------------------------------------------------------------------------
        | Gestion demandes prestataires
        |--------------------------------------------------------------------------
        */


        Route::resource('prestataires', AdminPrestataireController::class);



        Route::post('/prestataires/{id}/accepter',
            [AdminPrestataireController::class,'accepter']
        )->name('prestataires.accepter');



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
    | Dashboard utilisateur
    |--------------------------------------------------------------------------
    */


    Route::get('/dashboard',
[DashboardController::class,'index'])
->middleware('verified')
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


    Route::get('/devenir-prestataire',
        [PrestataireController::class,'create']
    )->name('demande.create');



    Route::post('/devenir-prestataire',
        [PrestataireController::class,'store']
    )->name('prestataire.store');






    /*
    |--------------------------------------------------------------------------
    | Gestion prestations du prestataire
    |--------------------------------------------------------------------------
    */


    Route::resource('prestations', PrestationsController::class);



});




Route::get('/services/{prestation}', [ServiceController::class,'show'])
->name('services.show');




/*
|--------------------------------------------------------------------------
| Authentification Breeze
|--------------------------------------------------------------------------
*/


require __DIR__.'/auth.php';