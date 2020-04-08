@extends('layouts.app')
@section('content')
@if(session()->has('error'))
<div class="alert alert-danger">
   {{session()->get('error')}} 
</div>
@endif
<div class="clearfix">
<a href="/tags/create" class="btn btn-success float-right " style="margin-bottom: 5px">Add Tag</a>
</div>
<div class="card card-default">
    <div class="card-header">All Tags</div>
    <table class="card-body">
        <table class="table">
        <tbody>
           @foreach($tags as $tag)
           <tr>
               <td>
               {{$tag->name}}
               <span class="badge btn-primary ml-2">{{$tag->posts->count()}}</span>
               </td>
               <td>
                   <a href="tags/{{$tag->id}}/edit" class="btn btn-primary float-right btn-sm ml-2">Edit</a>
                  <form action="tags/{{$tag->id}}"method="post" class="float-right ">
                       @csrf
                       @method('delete')
                       <button class="btn btn-danger  btn-sm">Delete</a>  
                   </form>
                </td>
            </tr>
           @endforeach
            
    </tbody>   
        
    </table>    
    </div>
</div>


@endsection