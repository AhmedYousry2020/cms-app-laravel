@extends('layouts.app')
@section('content')
<div class="card card-default">
    <div class="card-header">
        {{isset($category) ? "Update Tags" : "Add a new  Tags"}}</div>
    <div class="card-body">
        <form action="{{isset($tag) ? route('tags.update',$tag->id) : route('tags.store') }}" method="post">
            @csrf
            @if(isset($tag))
            @method('put')
            @endif
            <div class="form-group">
                <label for="caregory">Tag Name</label>
                <input type="text" name="name" value="{{isset($tag)? $tag->name :"" }}" class="form-control" placeholder="Add a new Category" class="@error('name') is-invalid @enderror">
            </div>
            @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group">
    <button class="btn btn-success">
     {{isset($tag) ? "Update" : " Add" }}  
    </button>
</div>
        </form>
    </div>
@endsection
