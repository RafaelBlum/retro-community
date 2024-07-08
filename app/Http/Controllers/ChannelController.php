<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Post;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($slug)
    {
        $channel = Channel::where('slug', $slug)->firstOrFail();
        $posts = Post::where('user_id', '=', $channel->id)->get();

        return view('channel.home', compact('channel', 'posts'));
    }
}
