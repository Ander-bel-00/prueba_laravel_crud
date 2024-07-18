// Importa las configuraciones básicas, probablemente inicializando bibliotecas como Axios.
import './bootstrap';

// Importa las funciones necesarias de Vue y Inertia.
import { createApp, h } from 'vue';
import { createInertiaApp, Link } from '@inertiajs/vue3';

// Importa la biblioteca Axios para hacer solicitudes HTTP.
import axios from 'axios';

// Selecciona el meta tag que contiene el token CSRF del documento HTML.
const csrfTokenMetaTag = document.querySelector('meta[name="csrf-token"]');

// Si el meta tag existe, configura Axios para usar este token en todas las solicitudes.
if (csrfTokenMetaTag) {
  axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfTokenMetaTag.getAttribute('content');
}

// Configura Axios para incluir el header 'X-Requested-With' en todas las solicitudes,
// indicando que las solicitudes son hechas vía AJAX.
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Crea una aplicación Inertia con configuración específica.
createInertiaApp({
  // La función resolve define cómo se cargarán las páginas/componentes de Vue.
  resolve: name => {
    // Utiliza import.meta.glob para importar dinámicamente todos los componentes Vue en la carpeta Pages.
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
    // Devuelve el componente correspondiente al nombre dado.
    return pages[`./Pages/${name}.vue`];
  },
  // La función setup define cómo se configurará la aplicación.
  setup({ el, App, props, plugin }) {
    // Crea una nueva aplicación Vue.
    createApp({ render: () => h(App, props) })
      // Usa el plugin de Inertia en la aplicación.
      .use(plugin)
      // Registra el componente 'Link' globalmente para usarlo en cualquier lugar de la aplicación.
      .component('Link', Link)
      // Monta la aplicación en el elemento DOM proporcionado.
      .mount(el);
  },
});
