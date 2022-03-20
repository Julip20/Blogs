<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
class PostsController extends Controller
{
    public function show($id){

       $post= Post::findOrFail($id);

        return view('blog-post',compact('post'));
    }

    public function create(){

        return view('admin.posts.create');
     }

    public function store(Request $request){
          $request->validate([
              'title'=>'required',
              'post_image'=>'file',
              'body'=>'required'
          ]);
        //   if(request('post_image')){
        //       $inputs['post_image']= request('post_image')->store('images');
        //   }
        //   auth()->user()->posts()->create(request()->all());
        // auth()->user()->posts()->create($inputs);
       $user = User::find(1);

$post= new Post();
$post->title= $request->input('title');
$post->post_image= $request->input('post_image');
$post->body= $request->input('body');

$user->posts()->save($post);
// $user->posts()->create($post);


        return back();

        // $request->validate([
        //     'user_id'=>'required',
        //     'title'=>'required',
        //     'post_image'=>'required',
        //     'body'=>'required'
        // ]);
        // Post::create($request->all());
        // return back();
    }
}

