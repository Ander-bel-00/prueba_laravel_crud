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

        // Metodo para mostrar una pelicula.
        public function show($pelicula)
        {
            // Buscar una pelicula por id (el id se pasa desde la vista peliculas).
            $pelicula = Pelicula::find($pelicula);
    
            // Pasar variables del metodo a la vista.
            return view('peliculas.show', [
                // Pasar variable con el nombre post y con el valor que se le defina a esa variable.
                'pelicula' => $pelicula,
    
                // Otra forma en lugar de especicar el array: ,compact('post); va pasar ['post] => $post]
            ]);
        }



        // Metodo para eliminar una pelicula.
        public function destroy ($pelicula)
        {
            // Buscar una pelicula por el id.
            $pelicula = Pelicula::find($pelicula);

            $pelicula->delete();

            return redirect('/peliculas');
        }
}
