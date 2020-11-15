
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('categoria', require('./components/categoria.vue'));
Vue.component('editorial', require('./components/editorial.vue'));
Vue.component('idioma', require('./components/idioma.vue'));
Vue.component('pais', require('./components/pais.vue'));
Vue.component('autor', require('./components/autor.vue'));
Vue.component('libro', require('./components/libro.vue'));
Vue.component('solicitud', require('./components/solicitud.vue'));

const app = new Vue({
    el: '#app',
    data:{
        menu:0
    }
});
