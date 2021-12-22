import { viewport } from '@popperjs/core';
import Vue from 'vue';
import routes from './router/index';
require('./bootstrap');
<<<<<<< HEAD
import Swal from 'sweetalert2'
import Toasted from 'vue-toasted';
Vue.use(Toasted)

=======
import Toasted from 'vue-toasted';
Vue.use(Toasted)
>>>>>>> 2e2c608f8211534f9c9210bd29910ef3b1db0142
Vue.component('app-header', require('./components/Header.vue').default);
const app = new Vue({
    el: '#app',
    router: routes,
});
