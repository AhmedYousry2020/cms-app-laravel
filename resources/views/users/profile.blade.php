@extends('layouts.app')
@section('content')
<div class="card card-default">
    <div class="card-header">
        Profile Edit</div>
    <div class="card-body">
        <form action=" {{route('users.update',$user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" value="{{$user->name}}" class="form-control" >
            </div>
                       <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" value="{{$user->email}}" class="form-control" >
            </div>
             <div class="form-group">
                <label for="cabout">About:</label>
                <textarea class="form-control" rows="2" name="about" placeholder="tell us for you">{{$profile->about}}</textarea>
            </div>
    
                       <div class="form-group">
                <label for="twitter">Twitter:</label>
                <input type="text" name="twitter" value="{{$profile->twitter}}" class="form-control" >
            </div>
                       <div class="form-group">
                <label for="facebook">Facebook:</label>
                <input type="text" name="facebook" value="{{$profile->facebook}}" class="form-control" >
            </div>

                       <div class="form-group">
        <label for="picture">picture:</label><br>
        <img src="{{$user->hasPicture() ? asset('storage/'.$user->getPicture()): $user->getGravatar()}}"style="border-radius: 50%;width: 60px;height: 60px"  >
                <input type="file" name="picture" class="form-control mt-2" >
            </div>
   
<div class="form-group">
    <button class="btn btn-success">
     Update Profile  
    </button>
</div>
        </form>
    </div>
@endsection
