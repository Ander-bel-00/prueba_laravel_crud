<x-app-layout>
    <form action="{{ route('peliculas.update', $pelicula->id) }}" method="POST">

        @csrf
        @method('PUT')


        <label for="">Titulo: <input type="text" value="{{$pelicula->titulo}}"></label>



    </form>
</x-app-layout>