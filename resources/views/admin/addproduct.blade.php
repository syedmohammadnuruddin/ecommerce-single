@extends('admin.layouts.template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Add Product</h2>
                <form method="post" enctype="multipart/form-data" action="{{route('storeProduct')}}">
                    @csrf
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name"><br>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Product Price"><br>
                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Product Quantity"><br>
                    <label for="exampleFormControlTextarea1" class="form-label">Short Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="product_short_des" rows="3"></textarea><br>
                    <label for="exampleFormControlTextarea1" class="form-label">Long Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="product_long_des" rows="3"></textarea><br>
                    <select class="form-select" aria-label="Default select example" name="product_category_id" id="product_category_id">
                        <option selected>Open Category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select><br>
                    <select class="form-select" aria-label="Default select example" name="product_subcategory_id" id="product_subcategory_id">
                        <option selected>Open Sub Category</option>
                        @foreach($subcategories as $subcategory)
                        <option value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
                        @endforeach
                    </select><br>
                    <label for="formFile" class="form-label">Choose Image</label>
                    <input class="form-control" type="file" id="formFile" name="product_img"><br>
                    <input type="submit" value="Add Product" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection
