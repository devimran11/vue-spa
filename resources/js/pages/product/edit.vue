
<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Edit Category</h5>
                        <router-link class="btn btn-success" :to="{name: 'category-list'}">Category List</router-link>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form @submit.prevent="updateCategory">
                                    <div class="form-group pb-2">
                                        <label for="">Category Name: </label>
                                        <input type="text" name="name" v-model="categoryForm.name" class="form-control" placeholder="category name" id="">
                                        <!-- <div style="color: red" v-if="form.errors.has('name')" v-html="form.errors.get('name')" /> -->
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Update Category</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Vue from "vue";
import Form from 'vform'
import axios from 'axios';
export default {
    data(){
        return {
            categoryForm: new Form({
                name: '',
            }),
        }
    },
    methods: {
        loadCategory(){
            let id = this.$route.params.id;
            
            axios.get(`/api/category/${id}/edit`).then(response => {
                this.categoryForm.name = response.data.name;
            });
        },
        updateCategory(){
            let id = this.$route.params.id;
            this.categoryForm.put(`/api/category/${id}`).then((resp) => {
                if(resp.data.status == 'success' ){
                    this.$router.push({ name: "category-list"});
                    this.$toasted.show(resp.data.message, {
                        type: "success",
                        position: "top-right",
                        duration: 4000,
                    });
                }   
            })
        },
    },
    mounted() {
        this.loadCategory();
    }
}
</script>

<style>

</style>
