@extends('admin.layouts.template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2>Edit Category</h2>

                <form action="{{route('updateCategory')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ $category_info->id }}" name="category_id">
                    <input type="text" class="form-control" name="category_name" value="{{$category_info->category_name}}"><br>
                    <input type="submit" value="Update Category" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection
