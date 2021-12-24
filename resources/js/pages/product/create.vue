<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Create Product</h5>
                        <router-link class="btn btn-success" :to="{name: 'product-list'}">Product List</router-link>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form @submit.prevent="createProduct">
                                    <div class="form-group pb-2">
                                        <label for="">Product Title: </label>
                                        <input type="text" v-model="form.title" name="title" class="form-control" placeholder="product title" id="">
                                        <div style="color: red" v-if="form.errors.has('title')" v-html="form.errors.get('title')" />
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="">Select Product Category</label>
                                        <select name="category_id" class="form-control" v-model="productForm.category_id" :class="{ 'is-invalid': productForm.errors.has('category_id') }">
                                            <option style="display:none;" value="" selected>Select Category</option>
                                            <option :value="category.id" v-for="category in categories" :key="category.id"> {{
                                                category.name }}</option>
                                        </select>
                                        <has-error :form="productForm" field="category_id"></has-error>
                                    </div> -->
                                    <div class="form-group">
                                        <label for="">Product Price</label>
                                        <input type="text" v-model="form.price" class="form-control" name="price" placeholder="product price">
                                        <div style="color: red" v-if="form.errors.has('price')" v-html="form.errors.get('price')" />
                                    </div>
                                    <div class="form-group pt-3">
                                        <label for="">Product Image</label>
                                        <input type="file" name="image" @change="uploadImage" class="form-control-file">
                                    </div>
                                    <div class="form-group pt-2">
                                        <label for="">Product Description</label>
                                        <textarea class="form-control" v-model="form.description" name="description" placeholder="product description" rows="3"></textarea>
                                        <div style="color: red" v-if="form.errors.has('description')" v-html="form.errors.get('description')" />
                                    </div>
                                    <div class="form-group pt-3">
                                        <button type="submit" class="btn btn-success">Create Product</button>
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
                title: "",
                price: "",
                image: "",
                description: ""
            }),
            error: "",
        }
    },
    methods: {
        createProduct(){
            this.form.post('/api/product')
            .then((resp)=>{
                if(resp.data.status=="success"){
                    this.$router.push({name: "product-list"});
                    this.$toasted.show(resp.data.message, {
                        type: "success",
                        position: "top-right",
                        duration: 5000,
                    });
                }
            })
        },
        uploadImage(e){
            const file = e.target.files[0];
            let render = new FileReader();
            render.readAsDataURL(file);
            this.form.image = file;
        },
    }
}
</script>

<style>

</style>
