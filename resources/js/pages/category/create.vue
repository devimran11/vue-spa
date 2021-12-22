<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Create Category</h5>
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
                                        <button type="submit" class="btn btn-success">Create Category</button>
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
        async createCategory () {
            const response = await this.form.post('/api/category')
            .then((resp) => {
                if(resp.data.status == 'success'){
                    this.$router.push({ name: "category-list"});
                    this.$toasted.show(resp.data.message, {
                        type: "success",
                        position: "top-right",
                        duration: 4000,
                    });
                }
            })
        }
    }
}
</script>

<style>

</style>
