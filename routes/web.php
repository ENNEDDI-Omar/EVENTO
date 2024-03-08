<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/////////////routes pour l'utilisateur authentifier:

    Route::middleware('auth')->group(function () {
        Route::get('home', [HomeController::class, 'index']);
    });    

/////////////mes routes par role:

// Route::group(['prefix' => 'administrator', 'as' => 'administrator.', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth', 'administrator']], function () {
    
//     Route::resource('dashboard','AdminDashController');
//     Route::resource('events','EventController');
//     Route::resource('categories','CategoryController');
//     Route::resource('establishments','EstablishmentController');  

// });

// Route::group(['prefix' => 'organisator', 'as' => 'organisator.', 'namespace' => 'App\Http\Controllers\Organisator', 'middleware' => ['auth', 'organisator']], function () {

// });



// Route::group(['prefix' => 'spectator', 'as' => 'spectator.', 'namespace' => 'App\Http\Controllers\Spectator', 'middleware' => ['auth', 'spectator']], function () {
//     Route::resource('home','HomeController');
// });



require __DIR__.'/auth.php';
