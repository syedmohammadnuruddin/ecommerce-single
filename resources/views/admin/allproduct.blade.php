@extends('admin.layouts.template')
@section('content')
    <h2>All Prodcut page</h2>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
    @endif
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">PRODUCT NAME</th>
            <th scope="col">IMAGE</th>
            <th scope="col">PRICE</th>
            <th scope="col">ACTION</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
        <tr>
            <th scope="row">{{$product->id}}</th>
            <td>{{$product->product_name}}</td>
            <td>
                <img style="height:100px;" src="{{asset($product->product_img)}}"><br>
                <a href="{{route('editProductImage', $product->id)}}" class="btn btn-primary" >Edit Image</a>
            </td>
            <td>{{$product->price}}</td>
            <td>
                <a href="{{route('editProduct', $product->id)}}" class="btn btn-primary" >Edit</a>
                <a href="{{route('deleteProduct', $product->id)}}" class="btn btn-warning" >Delete</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
