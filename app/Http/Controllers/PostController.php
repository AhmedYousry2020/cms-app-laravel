<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
 use App\categories;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;
use \App\Http\Requests\postRequest2;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('checkCategory')->only('create');
    }
    public function index()
    {
        return view('posts.index')->with('posts',post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories',  categories::all())->with('tags',  \App\Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
       // dd($request->image->store('images','public'));
           
      $post =  post::create([
          'title' => $request->title,
            'description'=>$request->description,
            'content'=>$request->content,
            'image'=>$request->image->store('images','public'),
            'categories_id'=>$request->categoryid,
          'user_id'=>$request->user_id
        ]);
      if($request->tags){
      $post->tags()->attach($request->tags);
      
      }
       $request->session()->flash('success','post created succssfully');
       return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        $user=$post->user;
        $profile=$user->profile;
        return view('posts.show')->with('post', $post)->with('categories', categories::all())->with('user', $user)->with('profile', $profile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        return view('posts.create')->with([
         'post'=>$post,
          'categories'=>  categories::all(),
            'tags'=>  \App\Tag::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(postRequest2 $request, post $post)
    {
        $data = $request->only(['title','description','content']);
        if($request->hasFile('image')){
            $image = $request->image->store('images','public');
            Storage::disk('public')->delete($post->image);
      $data['image']=$image;      
        }
         if($request->tags){
      $post->tags()->sync($request->tags);
      
      }
        $post->update($data);
        session()->flash('success','post updated succssfully');
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$post->delete();
     //   $request->session()->flash('success','post trashed succssfully');
       // return redirect('posts');
        $post = post::withTrashed()->where('id',$id)->first();
       
        if($post->trashed()){
            Storage::disk('public')->delete($post->image);
            $post->forceDelete();
            
        }  else {
        $post->delete();    
        }
        session()->flash('success','post trashed succssfully');
        return redirect('posts');
        
    }
    public function trashed() {
        $trashed = post::onlyTrashed()->get(); 
        return view('posts.index')->with('posts',$trashed) ;
    }
    public function restore($id){
        post::withTrashed()->where('id',$id)->restore(); 
        session()->flash('success','post restored succssfully');
        return redirect('posts');
    }
}
