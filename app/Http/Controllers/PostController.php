<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit(2)]);
    }
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }
}
?>