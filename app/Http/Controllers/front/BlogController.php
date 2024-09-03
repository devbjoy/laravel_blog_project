<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\FeaturedNew;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with(['getCategory','tags','user'])->where('status',1);
        
        $posts = $posts->orderBy('id','desc')->simplePaginate(8);
        $sliders = Slider::with(['getCategory:id,name','user:id,name,user_image'])->where('status',1)->where('publish','Yes')->get();
    

        $data['posts'] = $posts;
        $data['sliders'] = $sliders;
       

        return view('front.home',$data);
    }

    public function single_page(Request $request)
    {
        $slug = $request->slug;
        $posts = Post::with(['tags:id,name','getCategory:id,name','user:id,name,user_image'])->where('slug',$slug)->first();
        if(empty($posts)){
            return redirect()->route('home');
        };
        $category_id = $posts->category_id;
        $related_posts = Post::with(['tags:id,name','getCategory:id,name','user:id,name,user_image'])
                        ->where('category_id',$category_id)->limit(2)->orderBy('id','desc')->get();

        // select comment
        $comments = Comment::with(['user','commentReplies.user'])->where('post_id',$posts->id)->get();

        //  return $comments;

        $comment_allow = true;
        $data['comment_allow'] = $comment_allow;
        $data['comments'] = $comments;
        $data['post'] = $posts;
        $data['related_posts'] = $related_posts;

        return view('front.single-page',$data);
    }

    // filter porduct tag by

    public function filterTag($slug)
    {
        $posts = Post::with(['getCategory','tags','user'])->where('status',1);
        if(!empty($slug)){
            // $tag = Tag::where('name',$slug)->get();    
            $posts = $posts->whereHas('tags', function(Builder $query) use ($slug){
                $query->where('name',$slug);
            }); 

        }

        
        $posts = $posts->orderBy('id','desc')->simplePaginate(8);
        $sliders = Slider::with(['getCategory:id,name','user:id,name,user_image'])->where('status',1)->where('publish','Yes')->get();
    

        $data['posts'] = $posts;
        $data['sliders'] = $sliders;
       

        return view('front.home',$data);
    }

    // filter product category by
    public function filterCategory($slug)
    {
        $posts = Post::with(['getCategory','tags','user'])->where('status',1);

        if(!empty($slug)){
            $category = Category::where('slug',$slug)->first();
            $category_name = $category->name;
            $posts = $posts->where('category_id',$category->id); 
        }

        
        $posts = $posts->orderBy('id','desc')->simplePaginate(8);
        $sliders = Slider::with(['getCategory:id,name','user:id,name,user_image'])->where('status',1)->where('publish','Yes')->get();
    

        $data['posts'] = $posts;
        $data['sliders'] = $sliders;
        $data['category_name'] = $category_name;
       

        return view('front.home',$data);
    }

    public function filterSlider($slug)
    {
        $posts = Slider::with(['tags','getCategory:id,name','user:id,name,user_image'])->where('slug',$slug)->first();
        if(empty($posts)){
            return redirect()->route('home');
        };
        // return $posts;
        $category_id = $posts->category_id;
        $related_posts = Post::with(['getCategory:id,name','user:id,name,user_image'])
                        ->where('category_id',$category_id)->limit(2)->orderBy('id','desc')->get();

        $data['post'] = $posts;
        $data['related_posts'] = $related_posts;

        return view('front.single-page',$data);
    }

    public function filterFeaturedNews($slug)
    {
        $posts = FeaturedNew::with(['getCategory:id,name','user:id,name,user_image'])->where('slug',$slug)->first();
        if(empty($posts)){
            return redirect()->route('home');
        };
        $category_id = $posts->category_id;
        $related_posts = Post::with(['tags:id,name','getCategory:id,name','user:id,name,user_image'])
                        ->where('category_id',$category_id)->limit(2)->orderBy('id','desc')->get();

        // return $related_posts;


        $data['post'] = $posts;
        $data['related_posts'] = $related_posts;

        return view('front.single-page',$data);
    }
}
