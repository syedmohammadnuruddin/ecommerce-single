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
                <h2>Add Category</h2>

                <form action="{{route('storeCategory')}}" method="post">
                    {{ csrf_field() }}
                    <input type="text" class="form-control" name="category_name" placeholder="Electronics"><br>
                    <input type="submit" value="Add Category" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection
