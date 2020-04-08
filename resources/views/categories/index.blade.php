@extends('layouts.app')
@section('content')
@if(session()->has('error'))
<div class="alert alert-danger">
   {{session()->get('error')}} 
</div>
@endif
<div class="clearfix">
<a href="/categories/create" class="btn btn-success float-right " style="margin-bottom: 5px">Add Category</a>
</div>
<div class="card card-default">
    <div class="card-header">All Categories</div>
    <table class="card-body">
        <table class="table">
        <tbody>
           @foreach($categories as $category)
           <tr>
               <td>
               {{$category->name}}
               </td>
               <td>
                   <a href="categories/{{$category->id}}/edit" class="btn btn-primary float-right btn-sm ml-2">Edit</a>
                  <form action="categories/{{$category->id}}"method="post" class="float-right ">
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