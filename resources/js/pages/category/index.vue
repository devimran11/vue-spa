<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Product Categories</h5>
                        <router-link :to="{name: 'create-category'}" class="btn btn-success">Create Category</router-link>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="100px">ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th style="120px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="category in categories" :key="category.id">
                                    <td style="100px">{{category.id}}</td>
                                    <td>{{category.name}}</td>
                                    <td>{{category.slug}}</td>
                                    <td style="120px">
                                        <router-link :to="{name: 'edit-category', params: {id: category.id}}" class="btn btn-success btn-sm">Edit</router-link>
                                        <a @click="deleteCategory(category)" class="btn btn-danger btn-sm">Delete</a>
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
<<<<<<< HEAD
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
=======
            deleteCategory(id){
                // if (confirm("Are you sure to remove")) {
                //     axios
                //     .delete("/api/category/" + id)
                //     .then((resp) => {
                //         console.log(resp);
                //         if (resp.data.success == "OK") {
                //             alert(resp.data.message);
                //             this.categories.data.splice(index, 1);
                //         }
                //     })
                //     .catch();
                // }
                axios.delete('/api/category/${id}').then(()=>{

                })
>>>>>>> 2e2c608f8211534f9c9210bd29910ef3b1db0142
            }
        },
    }
</script>
