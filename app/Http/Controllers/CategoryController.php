<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function index()
    {
        //
    }

    /**
     * 1. return: Traz somente publicados que estiverem dentro da data agendada
     * 2. return: Traz os publicados E os não publicados, mas dentro da data agendada.
    */
    public function searchPostsForCategory($slug)
    {
        try {
            $category = Category::where('slug', $slug)->firstOrFail();
            $posts = $category->posts()->where(function (Builder $query){
                return $query->where('status', 'PUBLISHED')->orWhere('scheduled_for', '<=', now());
            })->paginate();
            $categories = Category::all();
            return view('pages.index', compact('posts', 'categories'));
        }catch (\Exception $exception){
            if(env('APP_DEBUG')){
                return redirect()->back();
            }
            return redirect()->back();
        }

    }
}
