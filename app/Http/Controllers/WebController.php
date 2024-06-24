<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Post;
use Illuminate\Http\Request;

class WebController extends Controller
{

    public function landing()
    {
        $campaign = true;

        $channels = Channel::all();
        $grid = $channels->count();

        if($campaign){
            return ($campaign == true ? view('landing', compact('channels', 'grid')): view('campaign'));
        }
    }

    public function home()
    {
        $section = false;
        $channels = Channel::all();
        $grid = $channels->count();

        $posts = Post::query()->where('status', '=', 'published')
            ->get()->take(3);
        return view('home', compact('posts', 'section', 'channels', 'grid'));
    }
}
