<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{

    protected $limit = 3;
    public function index()
    {
        //DB::enableQueryLog();
        $posts = Post::with('author')
        ->latestFirst()
        //->published()
        ->paginate($this->limit);
        return view('blog\index', compact('posts'));//->render();
        //dd(DB::getQueryLog());
    }

    public function category(Category $category)
    {
        $categoryName = $category->title;
        $posts = $category->posts()
                          ->with('author')
                          ->latestFirst()
                          ->paginate($this->limit);
        return view('blog\index', compact('posts','categoryName'));//->render();
    }

    public function show(Post $post)
    {
        return view('blog\show',compact('post'));
    }
}
