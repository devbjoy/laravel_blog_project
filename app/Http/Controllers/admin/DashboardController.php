<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FeaturedNew;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $category = Category::get();
        $posts = Post::get();
        $home_sliders = Slider::get();
        $featured_news = FeaturedNew::get();
        $users = User::get();
        $tags = Tag::get();

        $data['categories'] = $category;
        $data['posts'] = $posts;
        $data['home_sliders'] = $home_sliders;
        $data['featured_news'] = $featured_news;
        $data['users'] = $users;
        $data['tags'] = $tags;


        return view('dashboard',$data);
    }
}
