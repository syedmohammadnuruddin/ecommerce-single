@extends('admin.layouts.template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Edit Sub Category</h2>
                <form method="post" action="{{route('updateSubCat')}}">
                    @csrf
                    <input type="hidden" value="{{$subcatinfo->id}}" name="subcatid">
                    <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" value="{{$subcatinfo->subcategory_name}}"><br>

                    <input type="submit" value="Update Sub Category" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection
