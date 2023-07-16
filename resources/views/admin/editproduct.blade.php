@extends('admin.layouts.template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Update Product</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{route('updateProduct')}}">
                    @csrf
                    <input type="hidden" value="{{$product_info->id}}" name="id">
                    <input type="text" class="form-control" id="product_name" name="product_name" value="{{$product_info->product_name}}"><br>
                    <input type="number" class="form-control" id="price" name="price" value="{{$product_info->price}}"><br>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{$product_info->quantity}}"><br>
                    <label for="exampleFormControlTextarea1" class="form-label">Short Description</label>

                    <textarea class="form-control" id="exampleFormControlTextarea1" name="product_short_des" rows="3">{{$product_info->product_short_des}}</textarea><br>
                    <label for="exampleFormControlTextarea1" class="form-label">Long Description</label>

                    <textarea class="form-control" id="exampleFormControlTextarea1" name="product_long_des" rows="3">{{$product_info->product_long_des}}</textarea><br>
                    <input type="submit" value="Update Product" class="btn btn-primary">

                </form>
            </div>
        </div>
    </div>
@endsection


