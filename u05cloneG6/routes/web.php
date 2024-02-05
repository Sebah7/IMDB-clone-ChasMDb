<?php

use Illuminate\Support\Facades\Route;

Route::view('/', '/layouts/index');
Route::view('/movies', 'show');

// Route::get('/', function () {
//     return view('welcome');
// });
 