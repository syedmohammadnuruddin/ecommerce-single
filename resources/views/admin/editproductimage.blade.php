@extends('admin.layouts.template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Edit Product Image</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" enctype="multipart/form-data" action="{{route('updateProductImage')}}">
                    @csrf
                    <input type="hidden" value="{{$product_info->id}}" name="id">
                    <div class="row mb-3">
                        <div class="col-12">
                            <label>Previous Image</label><br>
                            <img style="height: 200px" src="{{asset($product_info->product_img)}}">
                        </div>
                    </div>
                    <label for="formFile" class="form-label">Choose Image</label>
                    <input class="form-control" type="file" id="formFile" name="product_img"><br>
                    <input type="submit" value="Update Product Image" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection
