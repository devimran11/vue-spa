import { viewport } from '@popperjs/core';
import Vue from 'vue';
import routes from './router/index';
require('./bootstrap');
import Toasted from 'vue-toasted';
Vue.use(Toasted)
Vue.component('app-header', require('./components/Header.vue').default);
const app = new Vue({
    el: '#app',
    router: routes,
});
