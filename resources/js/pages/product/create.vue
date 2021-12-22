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
                                <form>
                                    <div class="form-group pb-2">
                                        <label for="">Product Title: </label>
                                        <input type="text" name="title" class="form-control" placeholder="product title" id="">
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
                                        <input type="text" class="form-control" name="price" placeholder="product price">
                                    </div>
                                    <div class="form-group pt-3">
                                        <label for="">Product Image</label>
                                        <input type="file" class="form-control-file">
                                    </div>
                                    <div class="form-group pt-2">
                                        <label for="">Product Description</label>
                                        <textarea class="form-control" name="description" placeholder="product description" rows="3"></textarea>
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
