<x-app-layout>
    <h1 class="text-center font-bold text-2xl">Edit movie</h1>
    <form class="w-96 mx-auto dark:bg-gray-700 rounded p-5 mt-3" action="{{route('peliculas.update', $pelicula)}}" method="POST">
        {{-- Token dentro del fomulario que identifica que el formualrio le pertenece al usuario --}}
        @csrf

        {{-- Input oculto para indicar a laravel que el formulario tiene como metodo 'PUT' --}}
        @method('PUT')
        <div class="mb-5">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Titulo</label>
            <textarea type="text"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                placeholder="Title here" required name="titulo">{{ $pelicula->titulo }}</textarea>
        </div>
        <div class="mb-5">
            <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Categoria</label>
            <textarea rows="5"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                required name="categoria">{{ $pelicula->categoria }}</textarea>
        </div>
        <div class="mb-5">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Sinopsis
            </label>
            <input type="text"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                required name="sinopsis" value="{{ $pelicula->sinopsis }}" />
        </div>
        <div class="flex justify-center items-center">
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Edit movie</button>
        </div>
    </form>
</x-app-layout>
