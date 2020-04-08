@extends('layouts.app')
@section('content')
<div class="card card-default">
    <div class="card-header">
        {{isset($category) ? "Update Categories" : "Add a new Categories"}}</div>
    <div class="card-body">
        <form action="{{isset($category) ? route('categories.update',$category->id) : route('categories.store') }}" method="post">
            @csrf
            @if(isset($category))
            @method('put')
            @endif
            <div class="form-group">
                <label for="caregory">Category Name</label>
                <input type="text" name="name" value="{{isset($category)? $category->name :"" }}" class="form-control" placeholder="Add a new Category" class="@error('name') is-invalid @enderror">
            </div>
            @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group">
    <button class="btn btn-success">
     {{isset($category) ? "Update" : " Add" }}  
    </button>
</div>
        </form>
    </div>
@endsection
