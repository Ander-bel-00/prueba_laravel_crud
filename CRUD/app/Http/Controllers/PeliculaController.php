<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PeliculaController extends Controller
{
    // Metodo para mostrar todas las peliculas.
    public function index(){
        $peliculas = Pelicula::orderBy('id', 'asc')->get();
        
        return Inertia::render('PeliculasIndex', compact('peliculas'));
    }

    // Metodo para mostrar el formulario de creación de peliculas.
    public function create(){
        return Inertia::render('CreatePelicula');
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

        return Inertia::render('Editar', compact('pelicula'));
        
        // return view('peliculas.edit', compact('pelicula'));
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

        // Metodo para mostrar una pelicula.
        public function show($pelicula)
        {
            // Buscar una pelicula por id (el id se pasa desde la vista peliculas).
            $pelicula = Pelicula::find($pelicula);


            
            return Inertia::render('ShowPelicula', compact('pelicula'));

            // Pasar variables del metodo a la vista.
            // return view('peliculas.show', [
            //     // Pasar variable con el nombre post y con el valor que se le defina a esa variable.
            //     'pelicula' => $pelicula,
    
            //     // Otra forma en lugar de especicar el array: ,compact('post); va pasar ['post] => $post]
            // ]);
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
