<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.all_category',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'status' => 'required|int'
        ]);

        $slug = Str::slug($request->name,'-');

        
        $category = Category::create([
          'name' => $request->name,
          'slug' => $slug,
          'status' => $request->status,

        ]);

        return redirect()->route('category.index')->with('status','This Category Inserted Successfully');
        
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
        $category = Category::find($id);

        if(empty($category)){
            return redirect()->route('category.index')->with('delete','This Category is Empty');
        }else{
            return view('admin.categories.edit',['category' => $category]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'status' => 'required|int',
        ]);

        $slug = Str::slug($request->name,'-');

        
        $category = Category::where('id',$id)->update([
          'name' => $request->name,
          'slug' => $slug,
          'status' => $request->status,

        ]);

        return redirect()->route('category.index')->with('status','This Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

        if($category){
            $category->delete();

            return redirect()->route('category.index')->with('delete','This Category Deleted Successfully');
        }
    }
}
