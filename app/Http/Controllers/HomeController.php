<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {

        $categories=Category::orderBy('id','DESC')->limit(3)->get();
        $posts=Post::orderBy('id','DESC')->where('post_type','=','post')->limit(3)->get();
        $pages=Post::orderBy('id','DESC')->where('post_type','=','page')->limit(3)->get();

        return view('Admin.index',compact('posts','pages','categories'));
    }
}
