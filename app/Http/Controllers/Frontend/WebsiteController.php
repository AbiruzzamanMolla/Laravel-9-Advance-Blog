<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\WebsiteSetting;
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

    public function searchPosts($type, $search){
        $query = Post::with('category', 'tags', 'user:id,name');
        if($type == 'category' && !empty($search)){
            $query->whereHas('category', function ($q) use ($search) {
                $q->where('slug', 'LIKE', "%$search%");
            });
        }
        if($type == 'tag' && !empty($search)){
            $query->whereHas('tags', function ($q) use ($search) {
                $q->where('slug', 'LIKE', "%$search%");
            });
        }
        if($type == 'author' && !empty($search)){
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%");
            });
        }
        $posts = $query->latest('id')->paginate(10);
        return view('frontend.index', [
            'posts' => $posts
        ]);
    }

    public function searchKeywordPosts(Request $request){
        $query = Post::with('category');
        if(!empty($request->keyword)){
            $query->where('body', 'LIKE', "%{$request->keyword}%")->orWhere('title', 'LIKE', "%{$request->keyword}%")->orWhere('description', 'LIKE', "%{$request->keyword}%");
        } else {
            abort(404);
        }
        $posts = $query->latest('id')->paginate(10);
        return view('frontend.index', [
            'posts' => $posts
        ]);
    }
}
