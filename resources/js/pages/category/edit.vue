
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
                                <form @submit.prevent="createCategory" @keydown="form.onKeydown($event)">
                                    <div class="form-group pb-2">
                                        <label for="">Category Name: </label>
                                        <input type="text" name="name" v-model="form.name" class="form-control" placeholder="category name" id="">
                                        <div style="color: red" v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
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
            form: new Form({
                name: ""
            }),
            error: "",
        }
    },
    methods: {
        edit() {
        axios
            .get("/api/category/" + this.$route.params.id)
            .then((resp) => {
                console.log(resp)
            if (resp.data.status == "success") {
                this.form.name = resp.data.editCategory.name;
            }
            else {
                this.error = "some thing want to wrongs";
            }
            })
            .catch((error) => {
            console.log(error);
            });
        },
    },
    mounted() {
        this.edit();
    }
}
</script>

<style>

</style>
