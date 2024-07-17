<x-app-layout>
    <form action="{{ route('peliculas.update', $pelicula->id) }}" method="POST">

        @csrf
        @method('PUT')


        <label for="">Titulo: <input type="text" name="titulo" value="{{$pelicula->titulo}}"></label>
        <br><br>
        <label for="">Categoria: <input type="text" name="categoria" value="{{$pelicula->categoria}}"></label>
        <br><br>
        <label for="">Sinopsis: <input type="text" name="sinopsis" value="{{$pelicula->sinopsis}}"></label>
        <br><br>
        <label for="">Fecha de lanzamiento: <input type="date" name="fecha_publicacion" value="{{$pelicula->fecha_publicacion}}"></label>
        <br><br>
        <input type="Submit" value="Actualizar">
    </form>
</x-app-layout>