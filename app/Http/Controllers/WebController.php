<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class WebController extends Controller
{

    public function landing()
    {
        $campaign = true;

        if($campaign){
            return ($campaign == true ? view('landing'): view('campaign'));
        }
    }

    public function home()
    {
        $posts = Post::query()->where('status', '=', 'published')
            ->get()->take(3);
//        return view('home', compact('posts'));
        return view('home', compact('posts'));
    }
}
