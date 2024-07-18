<template>
    <div>
      <h1 class="text-center font-bold text-2xl">Edit movie</h1>
      
      <form @submit.prevent="submitForm" class="w-96 mx-auto dark:bg-gray-700 rounded p-5 mt-3">
        <!-- Token para protección CSRF -->
        <input type="hidden" name="_token" :value="csrfToken">
  
        <!-- Método PUT -->
        <input type="hidden" name="_method" value="PUT">
  
        <div class="mb-5">
          <label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo</label>
          <textarea v-model="form.titulo"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
            placeholder="Title here" required></textarea>
        </div>
        <div class="mb-5">
          <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoria</label>
          <textarea v-model="form.categoria" rows="5"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
            required></textarea>
        </div>
        <div class="mb-5">
          <label for="sinopsis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sinopsis</label>
          <input v-model="form.sinopsis" type="text"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
            required />
        </div>
        <div class="mb-5">
          <label for="fecha_publicacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha</label>
          <input v-model="form.fecha_publicacion" type="text"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
            readonly />
        </div>
        <div class="flex justify-center items-center">
          <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Edit movie
          </button>
        </div>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    name: 'Editar',
    data() {
      return {
        form: {
          titulo: '',
          categoria: '',
          sinopsis: '',
          fecha_publicacion: ''
        },
        csrfToken: ''
      };
    },
    created() {
      // Cargar información de la película
      this.form = {
        titulo: this.pelicula.titulo,
        categoria: this.pelicula.categoria,
        sinopsis: this.pelicula.sinopsis,
        fecha_publicacion: this.pelicula.fecha_publicacion
      };
  
      // Obtener token CSRF
      this.csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    },
    props: {
      pelicula: {
        type: Object,
        required: true
      }
    },
    methods: {
      submitForm() {
        // Implementar lógica para enviar el formulario usando Axios o Fetch
        // Ejemplo con Axios:
        axios.put(`/api/peliculas/${this.pelicula.id}`, this.form)
          .then(response => {
            // Manejar la respuesta
            console.log('Película actualizada:', response.data);
          })
          .catch(error => {
            // Manejar el error
            console.error('Error al actualizar película:', error);
          });
      }
    }
  };
  </script>
  
  <style scoped>
  /* Aquí puedes añadir estilos específicos para este componente si es necesario */
  </style>
  