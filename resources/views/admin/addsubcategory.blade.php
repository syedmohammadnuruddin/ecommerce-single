@extends('admin.layouts.template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Add Sub Category</h2>
                <form method="post" action="{{route('storeSubCategory')}}">
                    @csrf
                    <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" placeholder="Television"><br>
                    <select class="form-select" aria-label="Default select example" id="category_id" name="category_id">
                        <option selected>Open this select menu</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach

                    </select><br>
                    <input type="submit" value="Add Sub Category" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection
