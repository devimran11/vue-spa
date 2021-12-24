<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Product List</h5>
                        <router-link :to="{name: 'create-product'}" class="btn btn-success">Create Product</router-link>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 100px"> Id </th>
                                    <th> Image </th>
                                    <th> Title </th>
                                    <th> Category </th>
                                    <th style="width: 170px"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="product in products" :key="product.id">
                                    <td>{{product.id}}</td>
                                    <td>
                                        <img :src="product.image" alt="" width="50" height="50">
                                    </td>
                                    <td>{{product.price}}</td>
                                    <td>{{product.description}}</td>
                                    <td>
                                        <router-link :to="{name: 'edit-product', params:{id: product.id}}" class="btn btn-success btn-sm">Edit</router-link>
                                        <a @click="deleteProduct(product)" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2'
    export default {
        data(){
            return{
                products: [],
            }
        },
        created() {
            this.getProduct();
        },
        methods: {
            getProduct(){
                axios.get('/api/product')
                .then(resp => {
                    // console.log(resp);
                    this.products = resp.data.products;
                });
            },
            deleteProduct(product, index) {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't delete this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes!",
                }).then((result) => {
                    if (result.value) {
                    axios.delete(`/api/product/${product.id}`).then(() => {
                    this.$toast.success({
                        title:'Success!',
                        message:'Product deleted successfully.'
                        });
                    });
                    let index = this.products.indexOf(product);
                    this.products.splice(index, 1);
                    } else {
                        this.$toasted.show("OK ! no action here", {
                            position: "top-center",
                            type: "info",
                            duration: 3000,
                        });
                    }
                });
            }
        },
    }
</script>
