<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('admin.tags.all_tag',['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.add_tag');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'tag' => 'required',
        ]);

        if($validate){
            $tag = Tag::create([
                'name' => $request->tag,
            ]);

            if($tag){
                return redirect()->route('tags.index')->with('success','Tag Inserted Successfully');
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
        $tag = Tag::find($id);

        if(empty($tag)){
            return redirect()->route('tags.index')->with('error','Tag not found');
        }

        return view('admin.tags.edit_tag',['tags' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'tag' => 'required',
        ]);

        if($validate){
            $tag = Tag::where('id',$id)->update([
                'name' => $request->tag,
            ]);

            if($tag){
                return redirect()->route('tags.index')->with('success','Tag Updated Successfully');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tag::find($id);

        $tag->delete();
        
        return redirect()->route('tags.index')->with('error','Tag has been deleted');
    }
}
