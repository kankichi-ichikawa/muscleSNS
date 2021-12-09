<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    // post一
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    // post詳細
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }
    
    // post作成
    public function create()
    {
        return view('posts/create');
    }
    
    // post保存
     public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    // post編集
    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }
    
    // 編集保存
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
    
        return redirect('/posts/' . $post->id);
    }
    
    // 削除
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }
}
