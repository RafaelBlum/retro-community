<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class WebController extends Controller
{

    public function landing()
    {
        return view('home');
    }

    public function home()
    {
        $posts = Post::all();
        return view('index', compact('posts'));
    }
}
