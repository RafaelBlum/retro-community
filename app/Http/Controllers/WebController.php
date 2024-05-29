<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class WebController extends Controller
{

    public function landing()
    {
        return view('landing');
        $campaign = false;

        if($campaign){
            return ($campaign == true ? view('landing'): to_route('app.home'));
        }
    }

    public function home()
    {
        $posts = Post::all();
//        return view('home', compact('posts'));
        return view('home', compact('posts'));
    }
}
