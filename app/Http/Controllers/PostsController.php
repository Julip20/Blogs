<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostsController extends Controller
{
    public function show($id){

       $post= Post::findOrFail($id);

        return view('blog-post',compact('post'));
    }
}
