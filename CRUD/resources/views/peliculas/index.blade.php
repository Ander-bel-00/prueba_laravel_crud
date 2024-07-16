<x-app-layout>
    <h1>Proximos estrenos</h1>

    <ul>
        @foreach ($peliculas as $pelicula)
            <li>{{$pelicula->titulo}}</li>
        @endforeach
    </ul>
    {{ $peliculas->links() }}
</x-app-layout>