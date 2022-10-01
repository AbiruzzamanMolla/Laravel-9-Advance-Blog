<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
        return view('frontend.index');
    }
    public function about(){
        return view('frontend.pages.about');
    }
    public function contact(){
        return view('frontend.pages.contact');
    }
}
