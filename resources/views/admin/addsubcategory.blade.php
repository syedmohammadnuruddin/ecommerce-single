@extends('admin.layouts.template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Add Sub Category</h2>
                <form>
                    @csrf
                    <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" placeholder="Television"><br>
                    <select class="form-select" aria-label="Default select example" class="category" id="category">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select><br>
                    <input type="button" value="Add Sub Category" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection
