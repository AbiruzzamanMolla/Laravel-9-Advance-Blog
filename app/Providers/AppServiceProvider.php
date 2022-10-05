<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Models\WebsiteSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        if (!app()->runningInConsole()) {
            $categories = Category::all();
            view()->share('categories', $categories);
            $latest_posts = Post::with('category')->latest('updated_at')->take(5)->get();
            view()->share('latest_posts', $latest_posts);
            $WebsiteSetting = WebsiteSetting::first();
            view()->share('WebsiteSetting', $WebsiteSetting);
        }
    }
}
