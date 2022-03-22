<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Session;


class PostsController extends Controller
{

   public function index(){
       $posts =Post::all();

       return view('admin.posts.index',compact('posts'));
   }

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

if($request->hasfile('post_image'))
{
    $file = $request->file('post_image');
    $extenstion = $file->getClientOriginalExtension();
    $filename = time().'.'.$extenstion;
    $file->move('uploads/images/', $filename);
    $post->post_image = $filename;
}



$post->body= $request->input('body');
$user->posts()->save($post);
Session::flash('post-created-message','Post was created');

return redirect()->route('post.index');
}

  

public function destroy(Post $post){

   $post->delete();
   Session::flash('message','Post was deleted');
   return back();
  }

}

