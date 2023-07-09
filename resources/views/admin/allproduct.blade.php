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
        <tr>
            <th scope="row">1</th>
            <td>JAMUNA FAN</td>
            <td></td>
            <td>1500</td>
            <td>
                <a href="#" class="btn btn-primary" >Edit</a>
                <a href="#" class="btn btn-warning" >Delete</a>
            </td>
        </tr>
        </tbody>
    </table>
@endsection
