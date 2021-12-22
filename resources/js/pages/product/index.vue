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
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div style="max-width: 150px; max-height: 150px; overflow:hidden">
                                            <img src="https://picsum.photos/200" alt="" class="img-fluid">
                                        </div>  
                                    </td>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td>category</td>
                                    <td>
                                        <a class="btn btn-success btn-sm">Edit</a>
                                        <a class="btn btn-danger btn-sm">Delete</a>
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
                categories: [],
            }
        },
        created() {
            this.getCategory();
        },
        methods: {
            getCategory(){
                axios.get('/api/category')
                .then(resp => {
                    this.categories = resp.data.categories;
                });
            },
            deleteCategory(category, index) {
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
                    axios.delete(`/api/category/${category.id}`).then(() => {
                    this.$toast.success({
                        title:'Success!',
                        message:'Category deleted successfully.'
                        });
                    });
                    let index = this.categories.indexOf(category);
                    this.categories.splice(index, 1);
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
