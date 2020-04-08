@extends('layouts.app')
@section('content')

<div class="card card-default">
    <div class="card-header">All users</div>
    @if($users->count() > 0)
    <table class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>UserName</th>
                    <th>Role</th>


                </tr>
            </thead>
        <tbody>
           @foreach($users as $user)
           <tr>
             
               <td><img src="{{$user->hasPicture() ? asset('storage/'.$user->getPicture()): $user->getGravatar()}}" style="border-radius: 50%;width: 60px;height: 60px"></td>  
        
               <td>
               {{$user->name}}
               </td>
               <td>
                @if(!$user->isAdmin())
                <form action="{{route('users.makeadmin',$user->id)}}" method="POST"> 
                   @csrf 
                    <button type="submit" class="btn btn-success">Make Admin</button>
                </form>
                @else   
               {{$user->role}}
               @endif
               </td>
                 
            </tr>
           @endforeach
            
    </tbody>   
        
    </table>
        @else
        <div class="card-body" >
            <h1 class="text-center">No Users Yet. </h1>
        </div>
        @endif
    </div>
</div>


@endsection