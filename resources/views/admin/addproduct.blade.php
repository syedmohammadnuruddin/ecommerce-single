@extends('admin.layouts.template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Add Product</h2>
                <form>
                    @csrf
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name"><br>
                    <input type="number" class="form-control" id="product_price" name="product_price" placeholder="Product Price"><br>
                    <input type="number" class="form-control" id="product_quantity" name="product_quantity" placeholder="Product Quantity"><br>
                    <label for="exampleFormControlTextarea1" class="form-label">Short Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="short_description" rows="3"></textarea><br>
                    <label for="exampleFormControlTextarea1" class="form-label">Long Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="long_description" rows="3"></textarea><br>
                    <select class="form-select" aria-label="Default select example" name="category" id="category">
                        <option selected>Open Category</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select><br>
                    <select class="form-select" aria-label="Default select example" name="subcategory" id="subcategory">
                        <option selected>Open Sub Category</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select><br>
                    <label for="formFile" class="form-label">Choose Image</label>
                    <input class="form-control" type="file" id="formFile" name="product_img"><br>
                    <input type="button" value="Add Product" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection
