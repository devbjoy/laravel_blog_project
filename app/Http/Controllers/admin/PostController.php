<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('getCategory')->paginate(10);

        return view('admin.posts.all_post',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::get();
        $tags = Tag::get();
        return view('admin.posts.add_post',['categories' => $category,'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'title' => 'required',
            'post_img' => 'required|mimes:jpg,jpeg,png',
            'description' => 'required',
            'keyword' => 'required',
            'status' => 'required|int',
            'category' => 'required|int',
            'tags' => 'required',
        ]);


        
        if($validate){

            $file = $request->file('post_img');
            $newName = time().'-'.$file->getClientOriginalName();
            $image_path = $file->storeAs('post-images',$newName,'public');

            $slug = Str::slug($request->title,'-');

            

            $post = Post::create([
                'title' => $request->title,
                'meta_title' => $request->meta_title,
                'slug' => $slug,
                'description' => $request->description,
                'meta_description' => $request->meta_description,
                'keyword' => $request->keyword,
                'status' => $request->status,
                'category_id' => $request->category,
                'user_id' => Auth::user()->id,
                'date' => date('m/d/Y'),
                'post_image' => $image_path,
            ]);

            

            if($post){
                $post->tags()->attach($request->tags);
                return redirect()->route('posts.index')->with('success','This Post Added Successfully');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $posts = Post::with('tags')->find($id);
        $categories = Category::get();
        $tags = Tag::get();

        return view('admin.posts.edit_post',['post' => $posts,'categories' => $categories,'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);

        if(empty($post)){
            return redirect()->route('posts.index')->with('error','Post not found');
        }

        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'keyword' => 'required',
            'status' => 'required|int',
            'category' => 'required|int',
        ]);

        if($validate){

            $path = $request->file('post_img');
            $slug = Str::slug($request->title,'-');

            if(empty($path)){

            $post->update([
                'title' => $request->title,
                'meta_title' => $request->meta_title,
                'slug' => $slug,
                'description' => $request->description,
                'meta_description' => $request->meta_description,
                'keyword' => $request->keyword,
                'status' => $request->status,
                'category_id' => $request->category,
                'date' => date('m/d/Y'),
            ]);

            $post->tags()->sync($request->tags);
            return redirect()->route('posts.index')->with('success','This Post Updated Successfully');

            }else{
                // delete image 
                $image_path = public_path('storage/').$post->post_image;
                if(file_exists($image_path)){
                     @unlink($image_path);
                }


                $file = $request->file('post_img');
                $newName = time().'-'.$file->getClientOriginalName();
                $image_path = $request->file('post_img')->storeAs('post-images',$newName,'public');

                $post->update([
                    'title' => $request->title,
                    'meta_title' => $request->meta_title,
                    'slug' => $slug,
                    'description' => $request->description,
                    'meta_description' => $request->meta_description,
                    'keyword' => $request->keyword,
                    'status' => $request->status,
                    'category_id' => $request->category,
                    'date' => date('m/d/Y'),
                    'post_image' => $image_path,
                ]);

                $post->tags()->sync($request->tags);
                return redirect()->route('posts.index')->with('success','This Post Updated Successfully');
                
            }
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        if(empty($post)){
            return redirect()->route('posts.index')->with('error','Post Not Found');
        }

        $image_path = public_path('storage/').$post->post_image;
        if(file_exists($image_path)){
            @unlink($image_path);
        }

        $post->tags()->detach();
        $post->delete();

        return redirect()->route('posts.index')->with('error','Post has been deleted Successfully');
    }
}
