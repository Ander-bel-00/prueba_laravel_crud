<?php

use App\Http\Controllers\PeliculaController;
use App\Models\Pelicula;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::resource('/peliculas', PeliculaController::class)->names('peliculas');