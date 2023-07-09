@extends('admin.layouts.template')
@section('content')
    <h2>All Sub Category page</h2>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
    @endif
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
        @foreach($allsubcategories as $allsubcategory)
        <tr>
            <th scope="row">{{ $allsubcategory->id }}</th>
            <td>{{ $allsubcategory->subcategory_name }}</td>
            <td>{{ $allsubcategory->category_name }}</td>
            <td>{{ $allsubcategory->product_count }}</td>
            <td>
                <a href="{{route('editSubCat',$allsubcategory->id)}}" class="btn btn-primary" >Edit</a>
                <a href="{{route('deleteSubCat',$allsubcategory->id)}}" class="btn btn-warning" >Delete</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
