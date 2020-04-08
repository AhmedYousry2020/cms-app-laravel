<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        return view('users.index')->with('users',  \App\User::all());
    
        
    }
    public function makeAdmin(User $user) {
        $user->role="admin";
        $user->save();
        return redirect('users');
    }
    public function edit(User $user){
        
        return view('users.profile')->with('user', $user)->with('profile', $user->profile);
    }
    public function update(User $user ,Request $request) {
         $profile = $user->profile;
    $data = $request->all();
    if ($request->hasFile('picture')) {
      $picture = $request->picture->store('profilesPicture', 'public');
      $data['picture'] = $picture;
    }
    $profile->update($data);
    return redirect(route('home'));
        }
}
