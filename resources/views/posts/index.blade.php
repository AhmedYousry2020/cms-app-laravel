@extends('layouts.app')
@section('content')
<div class="clearfix">
<a href="/posts/create" class="btn btn-success float-right " style="margin-bottom: 5px">Add Post</a>
</div>
<div class="card card-default">
    <div class="card-header">All posts</div>
    @if($posts->count() > 0)
    <table class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </thead>
        <tbody>
           @foreach($posts as $post)
           <tr>
               <td>
                   <img src="{{asset('storage/'.$post->image)}}" style="width:100px;height: 60px" >
               
               </td>
               <td>
               {{$post->title}}
               </td>
               <td>
                   @if(!$post->trashed())
                   
                   <a href="posts/{{$post->id}}/edit" class="btn btn-primary float-right btn-sm ml-2">   
  Edit                 
                   </a>
                   @else
<a href="{{ route('trashed.restore',$post->id)}}" class="btn btn-primary float-right btn-sm ml-2">   
  Restore                 
                   </a>
                   @endif
                   
                  <form action="posts/{{$post->id}}"method="post" class="float-right ">
                       @csrf
                       @method('DELETE')
                       <button class="btn btn-danger  btn-sm">
                       {{$post->trashed() ? ' Delete' : 'Trash' }}   
                          
                       
                       </a>  
                   </form>
                </td>
            </tr>
           @endforeach
            
    </tbody>   
        
    </table>
        @else
        <div class="card-body" >
            <h1 class="text-center">No Posts Yet. </h1>
        </div>
        @endif
    </div>
</div>


@endsection