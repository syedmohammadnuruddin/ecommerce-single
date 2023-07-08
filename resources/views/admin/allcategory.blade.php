@extends('admin.layouts.template')
@section('content')
    <h2>All Category page</h2>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
    @endif
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">CATEGORY NAME</th>
            <th scope="col">SUB CATEGORY</th>
            <th scope="col">SLUG</th>
            <th scope="col">ACTION</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->category_name}}</td>
                <td>{{$category->subcategory_count}}</td>
                <td>{{$category->slug}}</td>
                <td>
                    <a href="{{route('editCategory',$category->id)}}" class="btn btn-primary" >Edit</a>
                    <a onclick="return confirm('Are you sure?')" href="{{route('deleteCategory',$category->id)}}" class="btn btn-warning" >Delete</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
