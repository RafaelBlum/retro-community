<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PostController extends Controller
{

    public function index()
    {
        try {
            $posts = Post::where('status', '=', 'PUBLISHED')->orWhere('scheduled_for', '<', now())->get();
            $lastPost = collect($posts);

            return view('pages.index', ['posts'=>$posts, 'lastPost' => $lastPost]);
        }catch (\Exception $exception){
            if(env('APP_DEBUG')){
                return redirect()->back();
            }

            return redirect()->back();
        }
    }


    public function post(Post $post)
    {
        return view('pages.post', compact('post'));
    }
}
