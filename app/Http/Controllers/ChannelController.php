<?php

namespace App\Http\Controllers;

use Exception;
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
        }catch (Exception $exception){
            if(env('APP_DEBUG')){
                return redirect()->back();
            }
            return redirect()->back();
        }
    }

    public function channels()
    {
        $channels = Channel::all();
        return view('channel.channels', compact('channels'));
    }

    public function dashboard($slug)
    {
        try {
            $channel = Channel::where('slug', $slug)->firstOrFail();
            
            if (!auth()->check() || auth()->user()->channel->id !== $channel->id) {
                return redirect()->route('my.channel', $slug);
            }

            $posts = Post::where('user_id', '=', $channel->user_id)->get();

            return view('channel.dashboard', compact('channel', 'posts'));
        } catch (Exception $exception) {
            if (env('APP_DEBUG')) {
                return redirect()->back();
            }
            return redirect()->back();
        }
    }
}
