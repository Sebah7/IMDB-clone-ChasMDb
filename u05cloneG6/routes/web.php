<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WatchlistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\UserController;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/movies/{id}', [MovieController::class], 'edit')->name('movies.edit');
    // Route::patch('/movies/{id}', [MovieController::class], 'update')->name('movies.update');
    // Route::delete('/movies/{id}', [MovieController::class], 'destroy')->name('movies.destroy');
});

//Testing admin role Auth
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
Route::get('/admin/home', [ReviewsController::class, 'adminModify'])->name('admin.modify');
//Modify.blade - Admin can delete reviews
Route::delete('/admin/admin-delete-review/{review}', [ReviewsController::class, 'adminDeleteReview'])->name('admin.deleteReview');

// Modify blade and store and create methods
Route::get('/modify', [MovieController::class, 'getActorsAndDirectors'])->middleware(['auth', 'admin'])->name('modify');
Route::get('/create', [MovieController::class, 'create'])->middleware(['auth', 'admin'])->name('movie.create');
Route::post('/create', [MovieController::class, 'store'])->middleware(['auth', 'admin'])->name('movie.store');
Route::get('/genres/create', [GenreController::class, 'create'])->middleware(['auth', 'admin'])->name('genres.create');
Route::post('/genres', [GenreController::class, 'store'])->middleware(['auth', 'admin'])->name('genres.store');
Route::post('/actors', [ActorController::class, 'store'])->middleware(['auth', 'admin'])->name('actors.store');
Route::post('/directors', [DirectorController::class, 'store'])->middleware(['auth', 'admin'])->name('directors.store');

//Modify.blade - Delete users
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.delete');

// GenreController connection WORKING
Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
Route::get('/genres/{id}', [GenreController::class, 'show'])->name('genres.show');
Route::resource('genres', GenreController::class)->except(['destroy']);
Route::delete('/genres/{id}', [GenreController::class, 'destroy'])->name('genres.destroy');


//This is routes to my WatchlistController
Route::middleware(['auth'])->group(function () {
    Route::get('/watchlist', [WatchlistController::class, 'index'])->name('watchlist.index');
    // Route::post('/watchlist', [WatchlistController::class, 'store'])->name('watchlist.store');
    Route::post('/watchlist', [WatchlistController::class, 'store'])->name('watchlist.store');

    Route::delete('/watchlist/{id}', [WatchlistController::class, 'destroy'])->name('watchlist.destroy');
});


Route::get('/reviews', [ReviewsController::class, 'index']); //reviews som alla kan se
//inloggade som kan hantera reviews
Route::resource('reviews', ReviewsController::class)->only(['index', 'create', 'store'])->middleware(['auth', 'verified']);

//this one is working
Route::get('/movies', [MovieController::class, 'index']);
//Working. For randomized movies to be seen on welcome.blade
Route::get('/', [MovieController::class, 'movieRandomizer']);
Route::delete('/movies/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');


//Seeing reviews your own reviews and being able to delete them.
Route::delete('/reviews/{review_id}', [ReviewsController::class, 'destroy'])->middleware(['auth', 'verified'])->name('reviews.destroy');
Route::get('/userdashboard', [ReviewsController::class, 'userDashboard'])->middleware(['auth', 'verified'])->name('userdashboard');


//This route takes in data from the getactorsanddirectors function in the actorcontroller, where we call for directortable.
Route::get('/cast', [ActorController::class, 'getactorsanddirectors']);


Route::delete('cast/{actor}', [ActorController::class, 'destroy'])->name('actors.destroy');
Route::get('movies/actors/{id}', [ActorController::class, 'show'])->middleware(['auth', 'admin'])->name('actors.show');


//Works to add review
Route::post('/reviews/store', [ReviewsController::class, 'store'])->name('reviews.store');

Route::post('/watchlist/add', [WatchlistController::class, 'addToWatchlist'])->name('watchlist.addToWatchlist');

Route::delete('cast/{id}', [DirectorController::class, 'destroy'])->name('directors.destroy');

Route::get('/onemovie/{title}', [MovieController::class, 'showPreview'])->name('onemovie.showPreview');


require __DIR__ . '/auth.php';
