import Vue from "vue";
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import Home from '../pages/Home.vue';
import categoryList from '../pages/category/index.vue';
import createCategory from '../pages/category/create.vue';
const routes = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: Home,
            name: 'home'
        },
        {
            path: '/category',
            component: categoryList,
            name: 'category-list'
        },
        {
            path: '/category/create',
            component: createCategory,
            name: 'create-category'
        },
    ]
});
export default routes;
