@extends('admin.layouts.template')
@section('content')
    <h2>All Sub Category page</h2>
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">SUB CATEGORY NAME</th>
            <th scope="col">CATEGORY</th>
            <th scope="col">PRODUCT</th>
            <th scope="col">ACTION</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Fan</td>
            <td>Electronics</td>
            <td>50</td>
            <td>
                <a href="#" class="btn btn-primary" >Edit</a>
                <a href="#" class="btn btn-warning" >Delete</a>
            </td>
        </tr>
        </tbody>
    </table>
@endsection
