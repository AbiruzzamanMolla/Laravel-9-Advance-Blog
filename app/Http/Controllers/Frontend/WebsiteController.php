<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
        $posts = Post::with('category')->latest('id')->paginate(10);
        return view('frontend.index', [
            'posts' => $posts
        ]);
    }
    public function postDetails($slug){
        $post = Post::whereSlug($slug)->with('category', 'tags', 'user:id,name')->first();
        return view('frontend.pages.post-details', [
            'post' => $post
        ]);
    }
    public function about(){
        return view('frontend.pages.about');
    }
    public function contact(){
        return view('frontend.pages.contact');
    }
}
