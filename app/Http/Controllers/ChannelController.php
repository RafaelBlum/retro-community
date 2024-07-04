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
    public function index(Channel $channel)
    {
        $posts = Post::where('user_id', '=', $channel->user->id)->get();
        return view('channel.home', compact('channel', 'posts'));
    }
}
