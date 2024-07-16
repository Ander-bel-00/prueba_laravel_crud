<x-app-layout>
    <h1>Proximos estrenos</h1>

    <a href="{{route('peliculas.create')}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Create a Movie</a>
    {{-- Directiva para recorrer un array y mostrar los registros --}}
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class="border">
                <th scope="col" class="px-6 py-3 border">
                    Titulo
                </th>
                <th scope="col" class="px-6 py-3 border">
                    Categoria
                </th>
                <th scope="col" class="px-6 py-3 border">
                    Sinópsis
                </th>
                <th scope="col" class="px-6 py-3 border">
                    Fecha de Publicación
                </th>
                <th scope="col" class="px-6 py-3 border">
                    Ver
                </th>
            </tr>
        </thead>
        @foreach ($peliculas as $pelicula)
    
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="text-wrap border px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{-- Mostrar en la tabla los datos de la tabla posts --}}
                    {{ $pelicula->titulo}}
                </th>
                <td class="border px-6 py-4">
                    {{ $pelicula->categoria}}
                </td>
                <td class="border px-6 py-4">
                    {{ $pelicula->sinopsis}}
                </td>
                <td class="border px-6 py-4">
                    {{ $pelicula->fecha_publicacion}}
                </td>
                <td class="border px-6 py-4">
                    <a href="">Ver</a>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    

    <div class="flex justify-center items-center p-5">
        {{ $peliculas->links() }}
    </div>
</div>
</x-app-layout>