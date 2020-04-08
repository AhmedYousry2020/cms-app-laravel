@extends('layouts.app')
@section('stylesheets')
<link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="card card-default">
    <div class="card-header">
        {{ isset($post)? "Edit a new post" : "Add a new Post" }} 
    <div class="card-body">
        <form action="{{isset($post)? route('posts.update',$post->id) : route('posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($post))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="post title">Title:</label>
                <input type="text" name="title"  class="form-control"  placeholder="Add a title" class="@error('title') is-invalid @enderror" value="{{isset($post)?$post->title : '' }}">
            @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
            </div>
            <div class="form-group">
                <label for="post description">Description:</label>
                <textarea  name="description" class="form-control" rows="2" placeholder="Add a description" class="@error('description') is-invalid @enderror">
                     {{ isset($post)? $post->description : "" }}
                </textarea>
            @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
            </div>
            <div class="form-group">
                <label for="post content">Content:</label>
            <input id="x" type="hidden" name="content" value="{{isset($post)?$post->content : '' }}">
             <trix-editor input="x"></trix-editor>
   
            </div>
            @if(isset($post))
            <div class="form-group">
                <img src="{{asset('storage/'.$post->image)}}" style="width: 100px"/>
            </div>
            @endif
            <div class="form-group">
                <label for="post image">Image:</label>
                <input type="file" class="form-control" name="image">
           </div>
  <div class="form-group">
                <label for="selectcategory">Select a Category</label>
                <select class="form-control" id="selectcat"  name="categoryid">
  @foreach($categories as $category)
  <option value="{{$category->id}}">{{$category->name}}</option>
@endforeach  
  </select>
            </div>
            
            @if(!$tags->count()==0)
            <div class="form-group">
                <label for="selecttag">Select a Tag</label>
                <select class="form-control" id="selecttag"  name="tags[]" multiple>
  @foreach($tags as $tag)
  <option value="{{$tag->id}}"
          @if(isset($post))
         @if($post->hasTag($tag->id))
         selected
         @endif
         @endif
         >
         {{$tag->name}}
  </option>
@endforeach  
  </select>
            </div>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            @endif
<div class="form-group">
    <button type="submit" class="btn btn-success">
     {{isset($post)? 'Update' : 'Add' }}
    </button>
</div>
        </form>
    </div>
    </div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.tags').select2();
});
</script>
@endsection
