
<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Edit Category</h5>
                        <router-link class="btn btn-success" :to="{name: 'product-list'}">Product List</router-link>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form @submit.prevent="updateProduct">
                                    <div class="form-group pb-2">
                                        <label for="">Product Title: </label>
                                        <input type="text" name="title" v-model="form.title" class="form-control" placeholder="product title" id="">
                                        <div style="color: red" v-if="form.errors.has('title')" v-html="form.errors.get('title')" />
                                    </div>
                                    <div class="form-group pb-2">
                                        <label for="">Product Price: </label>
                                        <input type="text" name="price" v-model="form.price" class="form-control" placeholder="product price" id="">
                                        <div style="color: red" v-if="form.errors.has('price')" v-html="form.errors.get('price')" />
                                    </div>
                                    <div class="form-group pt-3">
                                        <label for="">Previous Image: </label>
                                        <img :src="image" alt="" width="100" height="100">
                                    </div>
                                    <div class="form-group pt-3">
                                        <label for="">Product Image</label>
                                        <input type="file" @change="uploadImage" name="image" class="form-control-file">
                                    </div>
                                    <div class="form-group pt-2">
                                        <label for="">Product Description</label>
                                        <textarea class="form-control" v-model="form.description" name="description" placeholder="product description" rows="3"></textarea>
                                        <div style="color: red" v-if="form.errors.has('description')" v-html="form.errors.get('description')" />
                                    </div>
                                    <div class="form-group pt-2">
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
                title: '',
                price: '',
                image: '',
                description: '',
                _method: 'put',
            }),
            image: ''
        }
    },
    methods: {
        loadProduct(){
            let id = this.$route.params.id;
            axios.get(`/api/product/${id}/edit`)
            .then(resp => {
                this.form.title = resp.data.title;
                this.form.price = resp.data.price;
                this.form.description = resp.data.description;
                this.image = resp.data.image;
            });
        },
        updateProduct(){
            let id = this.$route.params.id;
            this.form.post('/api/product/' + id)
            .then((resp)=>{
                this.$router.push({name: "product-list"});
                this.$toasted.show(resp.data.message, {
                    type: "success",
                    position: "top-right",
                    duration: 5000,
                });
            })
        },
        uploadImage(e){
            const file = e.target.files[0];
            let render = new FileReader();
            render.readAsDataURL(file);
            this.form.image = file;
        },
    },
    mounted() {
        this.loadProduct();
    }
}
</script>

<style>

</style>
