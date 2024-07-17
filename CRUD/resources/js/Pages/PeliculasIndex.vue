<template>
    <div>
        <h1>Próximos estrenos</h1>

        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Crear una película</a>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-4">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="border">
                    <th scope="col" class="px-6 py-3 border">Título</th>
                    <th scope="col" class="px-6 py-3 border">Categoría</th>
                    <th scope="col" class="px-6 py-3 border">Sinópsis</th>
                    <th scope="col" class="px-6 py-3 border">Fecha de Publicación</th>
                    <th scope="col" class="px-6 py-3 border">Ver</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="pelicula in peliculas.data" :key="pelicula.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="border px-6 py-4">{{ pelicula.titulo }}</td>
                    <td class="border px-6 py-4">{{ pelicula.categoria }}</td>
                    <td class="border px-6 py-4">{{ pelicula.sinopsis }}</td>
                    <td class="border px-6 py-4">{{ pelicula.fecha_publicacion }}</td>
                    <td class="border px-6 py-4">
                        <a :href="`/peliculas/${pelicula.id}`">Ver</a>
                    </td>
                </tr>
            </tbody>
        </table>

        <Pagination :links="peliculas.links" />
    </div>
</template>

<script>
import Pagination from '../Components/Pagination.vue';

export default {
    name: 'PeliculasIndex',
    components: {
        Pagination,
    },
    props: {
        peliculas: {
            type: Object,
            required: true,
        },
    },
};
</script>
