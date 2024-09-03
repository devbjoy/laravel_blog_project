<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use App\Models\FeaturedNew;
use App\Models\Category;
use App\Observers\PostObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();

        Post::observe(PostObserver::class);

        View::share('popular_posts',\App\Models\Post::with(['getCategory','tags','user'])->where('status',1)->orderBy('views','desc')->limit(3)->get());
        View::share('resentPosts',\App\Models\Post::with(['getCategory','tags','user'])->where('status',1)->orderBy('id','DESC')->limit(3)->get());
        View::share('featuredNews',\App\Models\FeaturedNew::with(['getCategory:id,name','user:id,name'])->where('status',1)->where('publish','Yes')->orderBy('id','desc')->get());
        View::share('categories',\App\Models\Category::where('status',1)->get());
    }
}
