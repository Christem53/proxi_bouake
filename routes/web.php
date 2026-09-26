<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PrestataireController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PrestationsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PrestataireController as AdminPrestataireController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\NotificationController;
use App\Models\User;
use App\Models\Category;
use App\Models\Prestataire;
use App\Models\Demande;


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




Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    return "Cache nettoyé";
});


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

    $utilisateurs = User::count();

    $categories = Category::count();

    $prestataires = Prestataire::where('statut', 'accepte')
        ->count();

    $demandes = Demande::count();


    $performance = [
        'utilisateurs' => $utilisateurs,
        'prestataires' => $prestataires,
        'demandes' => $demandes,
        'categories' => $categories,
    ];


    return view('admin.dashboard', compact(
        'utilisateurs',
        'categories',
        'prestataires',
        'demandes',
        'performance'
    ));

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


    Route::get('/prestataires/{prestataire}/piece/{type}',
    [AdminPrestataireController::class, 'piece']
)->name('admin.prestataires.piece');



    });









/*
|--------------------------------------------------------------------------
| Routes utilisateur connecté
|--------------------------------------------------------------------------
*/


Route::middleware(['auth','nocache'])->group(function(){


    Route::get('/notifications',
        [NotificationController::class, 'index']
    )->name('notifications.index');




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
    | Profil public d'un prestataire
    |--------------------------------------------------------------------------
    */

    Route::get('/prestataires/{prestataire}',
    [PrestataireController::class,'show'])
    ->name('prestataire.profil');








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


/*
|--------------------------------------------------------------------------
| Demandes de service
|--------------------------------------------------------------------------
*/


// Formulaire pour envoyer une demande à un prestataire
Route::get('/demandes/create/{id}',
    [DemandeController::class, 'create']
)->name('demandes.create');



// Enregistrement d'une demande envoyée par un client
Route::post('/demandes',
    [DemandeController::class, 'store']
)->name('demandes.store');





/*
|--------------------------------------------------------------------------
| Demandes envoyées par le client
|--------------------------------------------------------------------------
| Exemple :
| Un client clique sur "Demander"
| Il retrouve ici toutes les demandes qu'il a envoyées
|--------------------------------------------------------------------------
*/


Route::middleware('auth')->group(function () {


    Route::get('/mes-demandes',
        [DemandeController::class,'mesDemandes']
    )->name('demandes.client');

    //Formulaire pour laisser un avis
    Route::get('/avis/{demande}', [AvisController::class, 'create'])
    ->name('avis.create');

    //Enregistrer l'avis
    Route::post('/avis', [AvisController::class, 'store'])
    ->name('avis.store');

});






/*
|--------------------------------------------------------------------------
| Demandes reçues par le prestataire
|--------------------------------------------------------------------------
| Exemple :
| Un prestataire voit les clients qui ont demandé ses services
|--------------------------------------------------------------------------
*/


Route::middleware('auth')->group(function () {


    Route::get('/demandes-recues',
        [DemandeController::class,'index']
    )->name('demandes.index');


});






/*
|--------------------------------------------------------------------------
| Actions prestataire sur une demande
|--------------------------------------------------------------------------
*/


Route::post('/demandes/{id}/accepter',
    [DemandeController::class,'accepter']
)->name('demandes.accepter');



Route::post('/demandes/{id}/refuser',
    [DemandeController::class,'refuser']
)->name('demandes.refuser');





/*
|--------------------------------------------------------------------------
| Affichage d'une prestation
|--------------------------------------------------------------------------
*/


Route::get('/services/{prestation}',
    [ServiceController::class,'show']
)->name('services.show');




/*
|--------------------------------------------------------------------------
| Authentification Breeze
|--------------------------------------------------------------------------
*/


require __DIR__.'/auth.php';
