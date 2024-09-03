<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Stringable;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider = Slider::with('getCategory')->paginate(10);
        return view('admin.sliders.all_slider',['sliders' => $slider]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        $tags = Tag::get();
        return view('admin.sliders.add_slider',['categories' => $categories,'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'description'=> 'required',
            'slider_img' => 'required|mimes:jpg,jpeg,png',
            'publish' => 'required',
            'show_home' => 'required',
            'category' => 'required|int'
        ]);

        if($validate){

            // generate slider image path
            $file = $request->file('slider_img');
            $newName = time().'-'.$file->getClientOriginalName();
            $image_path = $request->file('slider_img')->storeAs('slider-images',$newName,'public');

            $slug = Str::slug($request->title,'-');

            $sliders = Slider::create([
                'title' => $request->title,
                'slug' => $slug,
                'slider_image' => $image_path,
                'description' => $request->description,
                'category_id' => $request->category,
                'user_id' => Auth::user()->id,
                'status' => $request->status,
                'date' => date('m/d/Y'),
                'show_homepage' => $request->show_home,
                'publish' => $request->publish,
            ]);

            if($sliders){
                $sliders->tags()->attach($request->tags);
                return redirect()->route('slider.index')->with('success','This slider added successfully');
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

        $slider = Slider::with('tags')->find($id);
        $categories = Category::get();
        $tags = Tag::get();
        if(empty($slider)){
            return redirect()->route('slider.index')->with('error','Slider item Not Found');
        }

        // return $slider;
        return view('admin.sliders.edit_slider',['slider' => $slider,'categories' => $categories,'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider = Slider::find($id);
        $image_file = $request->file('slider_img');

        $validate = $request->validate([
            'title' => 'required',
            'publish' => 'required',
            'show_home' => 'required',
            'category' => 'required|int'
        ]);

        if(!empty($image_file)){
            $validate = $request->validate([
                'slider_img' => 'required|mimes:jpg,jpeg,png',
            ]);
        }

        if($validate){
            $slug = Str::slug($request->title,'-');
            if(empty($image_file)){
                $slider->update([
                    'title' => $request->title,
                    'slug' => $slug,
                    'category_id' => $request->category,
                    'description' => $request->description,
                    'status' => $request->status,
                    'date' => date('m/d/Y'),
                    'show_homepage' => $request->show_home,
                    'publish' => $request->publish,
                ]);
                $slider->tags()->sync($request->tags);
                return redirect()->route('slider.index')->with('success','Slider Data Updated Successfully');
            }else{

                // delete image
                $path_image = public_path('storage/').$slider->slider_image;

                if(file_exists($path_image)){
                    @unlink($path_image);
                }

                // generate new image path
                
                $file = $request->file('slider_img');
                $newName = time().'-'.$file->getClientOriginalName();
                $image_path = $request->file('slider_img')->storeAs('slider-images',$newName,'public');

                $slider->update([
                    'title' => $request->title,
                    'slider_image' => $image_path,
                    'category_id' => $request->category,
                    'status' => $request->status,
                    'date' => date('m/d/Y'),
                    'show_homepage' => $request->show_home,
                    'publish' => $request->publish,
                ]);
                $slider->tags()->sync($request->tags);
                return redirect()->route('slider.index')->with('success','Slider Data Updated Successfully');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);

        if(empty($slider)){
            return redirect()->route('slider.index')->with('error','This item is Empty');
        }else{

            $path_image = public_path('storage/').$slider->slider_image;

            if(file_exists($path_image)){
                @unlink($path_image);
            }
            $slider->tags()->detach();
            $slider->delete();

            return redirect()->route('slider.index')->with('error','Slider item deleted Successfully');
        }
    }
}
