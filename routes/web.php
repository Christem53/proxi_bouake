<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PrestataireController;


Route::resource('categories', CategoryController::class);

Route::get('/', function () {
    return view('home.index');
});

Route::prefix('admin')
    ->middleware(['auth','admin','nocache'])
    ->group(function(){

        Route::get('/dashboard', function(){

            return view('admin.dashboard');

        })->name('admin.dashboard');

    });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'nocache'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function(){

        Route::resource('categories', CategoryController::class);

        Route::resource('users', UserController::class);

        Route::get('/dashboard', function(){

            return view('admin.dashboard');

        })->name('admin.dashboard');

    });


    Route::middleware('auth')->group(function(){

    Route::get('/devenir-prestataire', 
        [PrestataireController::class,'create']
    )->name('prestataire.create');


    Route::post('/devenir-prestataire',
        [PrestataireController::class,'store']
    )->name('prestataire.store');

});