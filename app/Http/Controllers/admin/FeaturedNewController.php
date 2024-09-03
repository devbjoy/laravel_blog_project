<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeaturedNew;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class FeaturedNewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = FeaturedNew::with('getCategory')->paginate(10);

        return view('admin.featured_news.all_news',['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        $tags = Tag::get();
        return view('admin.featured_news.add_news',['categories' => $categories,'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validate = $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'category' => 'required|int',
            'status' => 'required|int',
        ]);

        if($validate){

            // generate slider image path
            $file = $request->file('image');
            $newName = time().'-'.$file->getClientOriginalName();
            $image_path = $request->file('image')->storeAs('feature-news-images',$newName,'public');

            $slug = Str::slug($request->title,'-');
            $news = FeaturedNew::create([
                'title' => $request->title,
                'image' => $image_path,
                'slug' => $slug,
                'description' => $request->description,
                'category_id' => $request->category,
                'user_id' => Auth::user()->id,
                'status' => $request->status,
                'date' => date('m/d/Y'),
                'show_home' => $request->show_home,
                'publish' => $request->publish,
                'unset_featured' => $request->unset_featured,
            ]);

            if($news){
                $news->tags()->attach($request->tags);
                return redirect()->route('featuredNews.index')->with('success','This slider added successfully');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = FeaturedNew::with('tags')->find($id);
        if(empty($news)){
            return redirect()->route('featuredNews.index')->with('error','Featured News Not Found');
        }

        $categories = Category::get();
        $tags = Tag::get();
        return view('admin.featured_news.edit_news',['news' => $news,'categories' => $categories,'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $news = FeaturedNew::find($id);
        $image_file = $request->file('image');

        $validate = $request->validate([
            'title' => 'required',
            'publish' => 'required',
            'show_home' => 'required',
            'unset_featured' => 'required',
            'category' => 'required|int'
        ]);

        if(!empty($image_file)){
            $validate = $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png',
            ]);
        }
        $slug = Str::slug($request->title,'-');
        if($validate){
            if(empty($image_file)){
                $news->update([
                    'title' => $request->title,
                    'slug' => $slug,
                    'description' => $request->description,
                    'category_id' => $request->category,
                    'status' => $request->status,
                    'date' => date('m/d/Y'),
                    'show_home' => $request->show_home,
                    'unset_featured' => $request->unset_featured,
                    'publish' => $request->publish,
                ]);

                $news->tags()->sync($request->tags);
                return redirect()->route('featuredNews.index')->with('success','Featured Data Updated Successfully');
            }else{

                // delete image
                $path_image = public_path('storage/').$news->image;

                if(file_exists($path_image)){
                    @unlink($path_image);
                }

                // generate new image path
                
                $file = $request->file('image');
                $newName = time().'-'.$file->getClientOriginalName();
                $image_path = $request->file('image')->storeAs('feature-news-images',$newName,'public');

                $news->update([
                    'title' => $request->title,
                    'image' => $image_path,
                    'slug' => $slug,
                    'description' => $request->descripti,
                    'category_id' => $request->category,
                    'status' => $request->status,
                    'date' => date('m/d/Y'),
                    'show_home' => $request->show_home,
                    'unset_featured' => $request->unset_featured,
                    'publish' => $request->publish,
                ]);
                $news->tags()->sync($request->tags);
                return redirect()->route('featuredNews.index')->with('success','Featured Data Updated Successfully');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = FeaturedNew::find($id);
        if(empty($news)){
            return redirect()->route('featuredNews.index')->with('error','Featured News Not Found');
        }else{
            $path = public_path('storage/'.$news->image);
            if(file_exists($path)){
                @unlink($path);
            }
            $news->tags()->detach();
            $news->delete();

            return redirect()->route('featuredNews.index')->with('error','Featured News Deleted Successfully');
        }
    }
}
