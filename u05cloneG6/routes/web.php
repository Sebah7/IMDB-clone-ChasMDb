<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

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

    //trying to figure out if these below are working
    Route::get('/create', [MovieController::class, 'create'])->name('movies.create');
    Route::post('/create', [MovieController::class, 'store'])->name('movies.store');
    Route::get('/movies/{id}', [MovieController::class], 'edit')->name('movies.edit');
    Route::patch('/movies/{id}', [MovieController::class], 'update')->name('movies.update');
    Route::delete('/movies/{id}', [MovieController::class], 'destroy')->name('movies.destroy');
});

Route::get('/movies', [MovieController::class, 'index']); //this one is working

Route::get('/modify', [MovieController::class, 'index']);

Route::get('/modify/create', [MovieController::class, 'create']);
Route::get('/modify/save', [MovieController::class, 'store']);
Route::get('/modify/edit', [MovieController::class, 'edit']);
Route::get('/modify/update', [MovieController::class, 'update']);



require __DIR__ . '/auth.php';
