<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Cloudinary;

class PostController extends Controller
{
    public function index(Post $post, Request $request)
    {
        $keyword = $request->input('keyword');

        $query = Post::query();

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('body', 'LIKE', "%{$keyword}%");
        }

        $posts = $query->orderBy('updated_at', 'DESC')->paginate(3)->withQueryString();
        
        return view('posts.index', compact('posts', 'keyword'));
    }

    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Post $post, PostRequest $request) 
    {
        $input = $request['post'];
        if($request->file('image')){
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input += ['image_url' => $image_url];
        }
        $input += ['user_id' => $request->user()->id];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        if($request->file('image')){
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input_post += ['image_url' => $image_url];
        }
        $input_post += ['user_id' => $request->user()->id]; 
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
    public function bookmark_posts()
    {
        $posts = \Auth::user()->bookmark_posts()->orderBy('created_at', 'desc')->paginate(3);
        $data = [
            'posts' => $posts,
        ];
        return view('posts.bookmarks', $data);
    }
}