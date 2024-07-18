<template>
    <div>
      <h1 class="text-center font-bold text-2xl">Información de la pelicula: {{ pelicula.titulo }}</h1>
  
      <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" @click.prevent="goBack">Go back</a>
      <div class="flex justify-center items-center mt-3">
        <div class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
          <div class="flex items-center justify-between mb-4">
            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Info</h5>
          </div>
          <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
              <li class="py-3 sm:py-4">
                <div class="flex items-center">
                  <div class="flex-shrink-0">
                  </div>
                  <div class="flex-1 min-w-0 ms-4">
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                      Categoria
                    </p>
                    <p class="text-sm text-gray-500  dark:text-gray-400">
                      {{ pelicula.categoria }}
                    </p>
                  </div>
                </div>
              </li>
              <li class="py-3 sm:py-4">
                <div class="flex items-center ">
                  <div class="flex-shrink-0">
                  </div>
                  <div class="flex-1 min-w-0 ms-4">
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                      Sinopsis
                    </p>
                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                      {{ pelicula.sinopsis }}
                    </p>
                  </div>
                </div>
              </li>
              <li class="py-3 sm:py-4">
                <div class="flex items-center">
                  <div class="flex-1 min-w-0 ms-4">
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                      Fecha de Publicación
                    </p>
                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                      {{ pelicula.fecha_publicacion }}
                    </p>
                  </div>
                </div>
              </li>
              <li class="py-3 sm:py-4">
                <div class="flex items-center">
                  <div class="flex-shrink-0">
                    <a :href="`/peliculas/${pelicula.id}/edit`">
                    <button type="submit" 
                      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit Movie
                    </button>
                    </a>
                  </div>
                  <div class="flex-1 min-w-0 ms-4">
                    <a :href="`/pelicula -> COMPLETAR AQUI`"> <------------ AQUIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII PARA ELIMINAR
                        <button @click="deleteMovie"
                          class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Delete Movie
                        </button>
                    </a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      pelicula: {
        type: Object,
        required: true
      }
    },
    methods: {
      goBack() {
        // Implement logic to go back
        // Example: this.$router.push('/peliculas');
      },
      editMovie() {
        // Implement logic to edit movie
        // Example: this.$router.push(`/peliculas/${this.pelicula.id}/edit`);
      },
      deleteMovie() {
        // Implement logic to delete movie
        // Example: this.$emit('delete-movie', this.pelicula.id);
      }
    }
  };
  </script>
  
  <style scoped>
  /* Aquí puedes añadir estilos específicos para este componente si es necesario */
  </style>
  