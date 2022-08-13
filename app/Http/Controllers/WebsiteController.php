<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class WebsiteController extends Controller
{
    public function index()
    {

        $category=Category::orderBy('name','ASC')->where('is_published','=','1')->get();
        $post=Post::orderBy('id','DESC')->where('post_type','=','post')->where('is_published','=','1')->paginate(5);

        return view('website.index',compact('category','post'));
    }
    public function post($slug)
    {
        $post=Post::where('slug','=',$slug)->where('post_type','=','post')->where('is_published','=','1')->first();
        if($post)
        {
            return view('website.post',compact('post'));
        }
        else
        {

            return Response::view('website.errors.404',array(),404);
        }
    }
    public function category($slug)
    {
        $category=Category::where('slug','=',$slug)->where('is_published','=','1')->first();
        if($category)
        {
            $post=$category->posts()->orderBy('post_id','DESC')->where('is_published','=','1')->paginate(5);

            return view('website.category',compact('category','post'));
        }
        else
        {

            return Response::view('website.errors.404',array(),404);
        }
    }
    public function page($slug)
    {
        $page=Post::where('slug','=',$slug)->where('post_type','=','page')->where('is_published','=','1')->first();
        if($page)
        {
            return view('website.page',compact('page'));
        }
        else
        {

            return Response::view('website.errors.404',array(),404);
        }

    }
}
