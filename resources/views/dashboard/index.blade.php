@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white text-center bg-info">
                        <div class="card-header">Users</div>
                        <div class="card-body">{{$users_count}}</div>
                </div>
                </div>
                   <div class="col-md-4">
                    <div class="card text-white text-center bg-danger">
                        <div class="card-header">Categories</div>
                        <div class="card-body">{{$categories_count}}</div>
                </div>
                </div>
                   <div class="col-md-4">
                    <div class="card text-white text-center bg-success">
                        <div class="card-header">Posts</div>
                        <div class="card-body">{{$posts_count}}</div>
                </div>
                </div>
       </div>
    </div>
</div>
</div>

@endsection
