<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function postsForCategory($slug)
    {
        try {
            $category = Category::where('slug', $slug)->firstOrFail();
            $posts = $category->posts()->where(function (Builder $query){
                return $query->where('status', 'PUBLISHED')->orWhere('scheduled_for', '<=', now());
            })->paginate(2)->fragment('posts');
            return view('pages.index', compact('posts', 'category'));
        }catch (\Exception $exception){
            if(env('APP_DEBUG')){
                return redirect()->back();
            }
            return redirect()->back();
        }

    }
}
