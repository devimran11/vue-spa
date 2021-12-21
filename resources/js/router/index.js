import Vue from "vue";
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import Home from '../pages/Home.vue';
import categoryList from '../pages/category/index.vue';
import createCategory from '../pages/category/create.vue';
import editCategory from '../pages/category/edit.vue';
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
        {
            path: '/category/edit/:id',
            component: editCategory,
            name: 'edit-category'
        },
    ]
});
export default routes;
