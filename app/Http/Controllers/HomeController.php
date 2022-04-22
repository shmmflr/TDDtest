<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        ## latest is last post;
        ##oldest() is react up^
        $posts = Post::latest()->paginate(15);

        return view('home', compact('posts'));
    }
}