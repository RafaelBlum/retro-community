<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use MongoDB\Driver\Query;

class PostController extends Controller
{

    public function index()
    {
        try {
            $posts = Post::where('status', '=', 'PUBLISHED')->orWhere('scheduled_for', '<', now())->paginate(2)->fragment('posts');
            $categories = Category::all();

            return view('pages.index', compact('posts', 'categories'));
        }catch (\Exception $exception){
            if(env('APP_DEBUG')){
                return redirect()->back();
            }

            return redirect()->back();
        }
    }


    public function post($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->views += 1;
        $post->save();
        return view('pages.post', compact('post'));
    }
}
