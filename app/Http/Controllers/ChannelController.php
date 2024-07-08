<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Post;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    public function index($slug)
    {
        try{
            $channel = Channel::where('slug', $slug)->firstOrFail();
            $posts = Post::where('user_id', '=', $channel->id)->get();

            return view('channel.home', compact('channel', 'posts'));
        }catch (\Exception $exception){
            if(env('APP_DEBUG')){
                return redirect()->back();
            }
            return redirect()->back();
        }
    }
}
