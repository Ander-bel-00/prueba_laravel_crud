<template>
    <div>
        <h1 class="text-center font-bold text-2xl">Add a Movie</h1>
        <div class="flex justify-center items-center">
            <form @submit.prevent="submitForm" class="w-96 mx-auto dark:bg-gray-700 rounded p-5 mt-3">
                <div class="mb-5">
                    <label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo</label>
                    <input v-model="pelicula.titulo" type="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Title here" required name="titulo"/>
                </div>
                <div class="mb-5">
                    <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoria</label>
                    <textarea v-model="pelicula.categoria" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required name="categoria"></textarea>
                </div>
                <div class="mb-5">
                    <label for="sinopsis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sinopsis</label>
                    <input v-model="pelicula.sinopsis" type="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required name="sinopsis"/>
                </div>
                <div class="mb-5">
                    <label for="fecha_publicacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de Publicación</label>
                    <input v-model="pelicula.fecha_publicacion" type="date" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required name="fecha_publicacion"/>
                </div>
                <div class="flex justify-center items-center">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add new movie</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
// Importa el módulo axios para realizar peticiones HTTP
import axios from 'axios';

// Exporta el objeto que representa el componente Vue
export default {
    // Nombre del componente Vue
    name: "CreatePelicula",

    // Método de datos del componente Vue
    data() {
        return {
            // Objeto 'pelicula' que contiene los datos del formulario
            pelicula: {
                titulo: '',                 // Campo para el título de la película
                categoria: '',              // Campo para la categoría de la película
                sinopsis: '',               // Campo para la sinopsis de la película
                fecha_publicacion: ''       // Campo para la fecha de publicación de la película
            }
        };
    },

    // Métodos del componente Vue
    methods: {
        // Método asíncrono para enviar el formulario de película al servidor
        async submitForm() {
            try {
                // Realiza una petición POST a la ruta '/peliculas' con los datos de 'pelicula'
                await axios.post('/peliculas', this.pelicula);
                // Redirige usando Inertia a la página de películas después de agregar una nueva película
                this.$inertia.visit('/peliculas');
            } catch (error) {
                // Captura y muestra un error en la consola si la creación de la película falla
                console.error('Error creating movie:', error);
            }
        }
    }
}
</script>
