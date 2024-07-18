<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Carbon\Carbon;

class PeliculaController extends Controller
{
    // Metodo para mostrar todas las peliculas.
    public function index(){
        $peliculas = Pelicula::orderBy('id', 'desc')->get();
        
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


    public function edit($pelicula)
    {
        $pelicula = Pelicula::find($pelicula);
    
        // Convertir la fecha al formato Y-m-d
        $pelicula->fecha_publicacion = Carbon::parse($pelicula->fecha_publicacion)->format('Y-m-d');
    
        return Inertia::render('EditPelicula', compact('pelicula'));
    }

    public function update(Request $request, $pelicula)
    {
        $pelicula = Pelicula::find($pelicula);
    
        $pelicula->titulo = $request->titulo;
        $pelicula->categoria = $request->categoria;
        $pelicula->sinopsis = $request->sinopsis;
        $pelicula->fecha_publicacion = Carbon::createFromFormat('Y-m-d', $request->fecha_publicacion);
    
        $pelicula->save();
    
        return Inertia::render('ShowPelicula', compact('pelicula'));
    }

        // Metodo para mostrar una pelicula.
        public function show($pelicula)
        {
            // Buscar una pelicula por id (el id se pasa desde la vista peliculas).
            $pelicula = Pelicula::find($pelicula);
    
            // Pasar variables del metodo a la vista.
            return Inertia::render('ShowPelicula', [
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
