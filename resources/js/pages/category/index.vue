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
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="category in categories" :key="category.id">
                                    <td>{{category.id}}</td>
                                    <td>{{category.name}}</td>
                                    <td>{{category.slug}}</td>
                                    <td>
                                        <router-link :to="{name: 'edit-category', params: {id: category.id}}" class="btn btn-success btn-sm">Edit</router-link>
                                        <a @click="deleteCategory(category.id)" class="btn btn-danger btn-sm">Delete</a>
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
            }
        },
    }
</script>
