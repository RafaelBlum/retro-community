<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{

    public function landing()
    {
        try{
            $campaign = true;

            $channels = Channel::all();
            $grid = $channels->count();

            return ($campaign == true ? view('landing', compact('channels', 'grid')): view('campaign'));
        }catch (\Exception $exception){
            if(env('APP_DEBUG')){
                return redirect()->back();
            }
            return redirect()->back();
        }
    }

    public function home()
    {
        try{
            $section = false;
            $channels = Channel::all();
            $grid = $channels->count();

            $posts = Post::query()->where('status', '=', 'published')->get()->take(3);

            return view('home', compact('posts', 'section', 'channels', 'grid'));
        }catch (\Exception $exception){
            if(env('APP_DEBUG')){
                return redirect()->back();
            }
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('app.home');
    }

    public function about()
    {
        return view('pages.about');
    }
}
