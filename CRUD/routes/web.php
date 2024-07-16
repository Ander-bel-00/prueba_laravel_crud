<?php

use App\Http\Controllers\PeliculaController;
use App\Models\Pelicula;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/peliculas', PeliculaController::class);


// Route::get('/prueba', function() {
    
//     $pelicula = new Pelicula;

//     $pelicula->titulo = 'Mortal Kombat';
//     $pelicula->categoria = 'Accion';
//     $pelicula->sinopsis = 'jaduken';
//     $pelicula->fecha_publicacion = '2025-04-26';

//     $pelicula->save();

//     return $pelicula;

// });