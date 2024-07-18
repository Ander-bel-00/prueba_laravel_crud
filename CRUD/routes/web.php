<?php

use App\Http\Controllers\PeliculaController;
use App\Models\Pelicula;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::resource('/peliculas', PeliculaController::class)->names('peliculas');




// Route::get('/prueba', function() {
    
//     $pelicula = new Pelicula;

//     $pelicula->titulo = 'Mortal Kombat';
//     $pelicula->categoria = 'Accion';
//     $pelicula->sinopsis = 'jaduken';
//     $pelicula->fecha_publicacion = '2025-04-26';

//     $pelicula->save();

//     return $pelicula;

// });