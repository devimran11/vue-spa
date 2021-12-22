import Vue from "vue";
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import Home from '../pages/Home.vue';
import categoryList from '../pages/category/index.vue';
import createCategory from '../pages/category/create.vue';
import editCategory from '../pages/category/edit.vue';
import productList from '../pages/product/index.vue';
import createProduct from '../pages/product/create.vue';
import editProduct from '../pages/product/edit.vue';
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
        {
            path: '/product',
            component: productList,
            name: 'product-list'
        },
        {
            path: '/product/create',
            component: createProduct,
            name: 'create-product'
        },
        {
            path: '/product/edit/:id',
            component: editProduct,
            name: 'edit-product'
        },
    ]
});
export default routes;
