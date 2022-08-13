<?php
use App\Models\Post;
function GetPages()
{
    $pages = Post::where('post_type', '=', 'page')->where('is_published', '=', '1')->get();
    return $pages;
}
