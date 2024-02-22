<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WatchlistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewsController;

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
// Den har ar en test. När movies routes är pushat vi testar och merga igen. 
Route::get('/modify', function () {
    return view('modify');
})->name('modify');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Routing is not final untill adding modify blade from another branch
Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
Route::get('/genres/{id}', [GenreController::class, 'show']) ->name('genres.show');
// Route for showing the form to create a new genre
Route::get('/genres/create', [GenreController::class, 'create'])->middleware(['auth','admin'])->name('genres.create');
// Route for storing a newly created genre
Route::post('/genres', [GenreController::class, 'store'])->middleware(['auth','admin'])->name('genres.store');


//This is routes to my WatchlistController
Route::middleware(['auth'])->group(function () {
    Route::get('/watchlist', [WatchlistController::class, 'index'])->name('watchlist.index');
    Route::post('/watchlist', [WatchlistController::class, 'store'])->name('watchlist.store');
    Route::delete('/watchlist/{watchlist}', [WatchlistController::class, 'destroy'])->name('watchlist.destroy');
});

require __DIR__.'/auth.php';

//Testing admin role Auth
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

/*
|In the code below with the addition of the 
|code after middleware we 
|are testing to see if the page 
|is accessed by admin only
*/ Route::get('/movies', [MovieController::class, 'index'])->middleware(['auth','admin']); 


Route::get('/reviews', [ReviewsController::class, 'index']); //reviews som alla kan se
//inloggade som kan hantera reviews
Route::resource('reviews', ReviewsController::class)->only(['index', 'create', 'store'])->middleware(['auth','verified']);



require __DIR__ . '/auth.php';

