<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Channel;
use App\Models\Post;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{

    public function templateTest()
    {
        $channels = Channel::all();

        $campings = Campaign::where('camping', true)->get();

        $grid = $channels->count();
        return view('campaings.template', compact('channels', 'campings', 'grid'));
    }

    public function landing()
    {
        try{

            $channels = Channel::all()->take(4);
            $grid = $channels->count();

            return view('landing', compact('channels',  'grid'));

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
            $channels = Channel::all()->take(4);
            $grid = $channels->count();

            $posts = Post::query()->where('status', '=', 'published')->get()->take(6);

            return view('home', compact('posts', 'section', 'channels', 'grid'));
        }catch (\Exception $exception){
            if(env('APP_DEBUG')){
                return redirect()->back();
            }
            return redirect()->back();
        }
    }

    public function about()
    {
        $channels = Channel::all();
        $posts = Post::query()->where('status', '=', 'published')->get();
        $campaings = Campaign::all();

        return view('pages.about', compact('channels', 'posts', 'campaings'));
    }

    public function policy()
    {
        return view('pages.policy');
    }

    public function support()
    {
        return view('pages.support');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('app.home');
    }
}
