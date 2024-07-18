<template>
    <h1 class="text-center font-bold text-2xl">Edit movie</h1>
    <form class="w-96 mx-auto dark:bg-gray-700 rounded p-5 mt-3" @submit.prevent="editPelicula">
        <div class="mb-5">
            <label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Titulo</label>
            <textarea id="titulo" v-model="form.titulo"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                placeholder="Title here" required></textarea>
        </div>
        <div class="mb-5">
            <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Categoria</label>
            <textarea id="categoria" v-model="form.categoria" rows="5"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                required></textarea>
        </div>
        <div class="mb-5">
            <label for="sinopsis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Sinopsis</label>
            <input id="sinopsis" v-model="form.sinopsis" type="text"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                required />
        </div>
        <div class="mb-5">
            <label for="fecha_publicacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Fecha</label>
            <input id="fecha_publicacion" v-model="form.fecha_publicacion" type="date"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                required />

        </div>
        <div class="flex justify-center items-center">
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Edit movie</button>
        </div>
    </form>
</template>

<script>
import axios from 'axios';

export default {
    name: "EditPelicula",
    props: {
        pelicula: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            form: {
                titulo: this.pelicula.titulo,
                categoria: this.pelicula.categoria,
                sinopsis: this.pelicula.sinopsis,
                fecha_publicacion: this.pelicula.fecha_publicacion,
            }
        };
    },
    methods: {
        editPelicula() {
            axios.put(`/peliculas/${this.pelicula.id}`, this.form, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                alert('Movie edited successfully');
                window.location.href = `/peliculas/${this.pelicula.id}`;
            })
            .catch(error => {
                console.error('There was an error editing the movie:', error);
            });
        }
    }
}
</script>
