<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    // Metodo para mostrar todas las peliculas.
    public function index(){
        $peliculas = Pelicula::orderBy('fecha_publicacion', 'desc')->paginate(10);

        return view('peliculas.index', compact('peliculas'));
    }

    // Metodo para mostrar el formulario de creación de peliculas.
    public function create(){
        return view('peliculas.create');
    }

    // Metodo para registrar una pelicula.
    public function store(Request $request){
        $pelicula = new Pelicula();
        $pelicula->titulo = $request->titulo;
        $pelicula->categoria = $request->categoria;
        $pelicula->sinopsis = $request->sinopsis;
        $pelicula->fecha_publicacion = $request->fecha_publicacion;
        
        $pelicula->save();

        return redirect('/peliculas');
    }


    public function edit($pelicula){
        $pelicula = Pelicula::find($pelicula);

        return view('peliculas.edit', compact('pelicula'));
    }

    public function update(Request $request, $pelicula)
    {
        $pelicula = Pelicula::find($pelicula);

        $pelicula->titulo = $request->titulo;
        $pelicula->categoria = $request->categoria;
        $pelicula->sinopsis = $request->sinopsis;
        $pelicula->fecha_publicacion = $request->fecha_publicacion;

        $pelicula->save();

        return view('peliculas.show', compact('pelicula'));
    }
}
