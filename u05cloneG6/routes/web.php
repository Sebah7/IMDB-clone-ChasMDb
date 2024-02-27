<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WatchlistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\ActorController;

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

    //trying to figure out which one of these below are working / 
    // Route::get('/create', [MovieController::class, 'create'])->name('movies.create');
    Route::post('/create', [MovieController::class, 'store'])->name('movies.store');
    // Route::get('/movies/{id}', [MovieController::class], 'edit')->name('movies.edit');
    // Route::patch('/movies/{id}', [MovieController::class], 'update')->name('movies.update');
    // Route::delete('/movies/{id}', [MovieController::class], 'destroy')->name('movies.destroy');
});



// Routing is not final untill adding modify blade from another branch
Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
Route::get('/genres/{id}', [GenreController::class, 'show'])->name('genres.show');
// Route for showing the form to create a new genre
Route::get('/genres/create', [GenreController::class, 'create'])->middleware(['auth', 'admin'])->name('genres.create');
// Route for storing a newly created genre
Route::post('/genres', [GenreController::class, 'store'])->middleware(['auth', 'admin'])->name('genres.store');
Route::resource('genres', GenreController::class)->except(['destroy']);
Route::delete('/genres/{id}', [GenreController::class, 'destroy'])->name('genres.destroy');



//This is routes to my WatchlistController
Route::middleware(['auth'])->group(function () {
    Route::get('/watchlist', [WatchlistController::class, 'index'])->name('watchlist.index');
    Route::post('/watchlist', [WatchlistController::class, 'store'])->name('watchlist.store');
    Route::delete('/watchlist/{watchlist}', [WatchlistController::class, 'destroy'])->name('watchlist.destroy');
});

//Testing admin role Auth
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

/*
|In the code below with the addition of the 
|code after middleware we 
|are testing to see if the page 
|is accessed by admin only
*/


Route::get('/reviews', [ReviewsController::class, 'index']); //reviews som alla kan se
//inloggade som kan hantera reviews
Route::resource('reviews', ReviewsController::class)->only(['index', 'create', 'store'])->middleware(['auth','verified']);
//alternativ för return i controller
//Route::resource('movies', MovieController::class);


//this one is working
Route::get('/movies', [MovieController::class, 'index']);

//this one is working
// Route::get('/modify', [MovieController::class, '']);

Route::get('/modify/create', [MovieController::class, 'create'])->middleware(['auth', 'admin'])->name('modify.create');
Route::post('/modify/save', [MovieController::class, 'store'])->middleware(['auth', 'admin'])->name('modify.store');
Route::get('/modify/edit', [MovieController::class, 'edit'])->middleware(['auth', 'admin'])->name('modify.edit');
Route::put('/modify/update', [MovieController::class, 'update'])->middleware(['auth', 'admin'])->name('modify.update');


//ActorController connection WORKING. First one is admin only, second one is public.
Route::post('/modify/actor', [ActorController::class, 'store'])->middleware(['auth', 'admin'])->name('actors.store');
Route::get('/movies', [ActorController::class, 'index'])->name('home');

//Seeing reviews your own reviews and being able to delete them.
Route::delete('/reviews/{review_id}', [ReviewsController::class, 'destroy'])->middleware(['auth','verified'])->name('reviews.destroy');
Route::get('/userdashboard', [ReviewsController::class, 'userDashboard'])->middleware(['auth','verified'])->name('userdashboard');




require __DIR__ . '/auth.php';
