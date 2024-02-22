<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WatchlistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\HomeController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //trying to figure out which one of these below are working / 
    // Route::get('/create', [MovieController::class, 'create'])->name('movies.create');
    Route::post('/create', [MovieController::class, 'store'])->name('movies.store');
    // Route::get('/movies/{id}', [MovieController::class], 'edit')->name('movies.edit');
    // Route::patch('/movies/{id}', [MovieController::class], 'update')->name('movies.update');
    // Route::delete('/movies/{id}', [MovieController::class], 'destroy')->name('movies.destroy');
});


//This is route to my WatchlistController
Route::get('/WatchlistController', [WatchlistController::class, 'index']);

require __DIR__ . '/auth.php';
//Testing admin role Auth
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

/*
|In the code below with the addition of the 
|code after middleware we 
|are testing to see if the page 
|is accessed by admin only
*/


//this one is working
Route::get('/movies', [MovieController::class, 'index']);

//this one is working
// Route::get('/modify', [MovieController::class, '']);

Route::get('/modify/create', [MovieController::class, 'create'])->middleware(['auth', 'admin'])->name('modify.create');
Route::post('/modify/save', [MovieController::class, 'store'])->middleware(['auth', 'admin'])->name('modify.store');
Route::get('/modify/edit', [MovieController::class, 'edit'])->middleware(['auth', 'admin'])->name('modify.edit');
Route::put('/modify/update', [MovieController::class, 'update'])->middleware(['auth', 'admin'])->name('modify.update');

require __DIR__ . '/auth.php';
