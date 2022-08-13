<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts=Post::orderBy('id','Desc')->where('post_type','=','post')->get();
        return view('Admin.post.index',compact('posts'));
    }


    public function create()
    {
        $categories=Category::orderBy('id','ASC')->get();

        return view('Admin.post.create',compact('categories'));
    }


    public function store(StorePostRequest $request)
    {


        $post=new Post();
        $post->user_id=Auth::id();
        $post->details=$request->details;
        $post->title=$request->title;
        $post->thumbnail=$request->thumbnail;
        $post->sub_title=$request->sub_title;
        $post->slug= str::slug($request->title);
        $post->post_type='post';
        $post->is_published=$request->publish;
        $post->save();
        $post->categories()->sync($request->category_id);
        session()->flash("message","Post created successfully");
        return redirect()->route('posts.index');

    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {

        $categories=Category::orderBy('id','ASC')->get();
        return view('Admin.post.edit',compact('post','categories'));
    }


    public function update(UpdatePostRequest $request, Post $post)
    {

        $post->details=$request->details;
        $post->title=$request->title;
        $post->thumbnail=$request->thumbnail;
        $post->sub_title=$request->sub_title;
        $post->slug=str::slug($request->title);
        $post->post_type='post';
        $post->is_published=$request->publish;
        $post->update();
        $post->categories()->sync($request->category_id,false);
        session()->flash("message","Post update successfully");
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('delete-message', 'Post deleted successfully');
        return redirect()->route('posts.index');
    }


}
