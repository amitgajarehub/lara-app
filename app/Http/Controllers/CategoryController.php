<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        return view('admin.category.index')->with(compact(['categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.category.create')->with(compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {	//
    	$request->validate([
            'name' => 'required',              
        ],[
            'name.required' => 'Name is required',
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->parent_id = $request->parent_category ? $request->parent_category : 0;

        if ($category->save() ) {
            return redirect('/category')->with(['success' => 'Category added successfully.']);
        }

        return redirect()->back()->with(['fail' => 'Unable to add category.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $id)
    {
        $categories = Category::all();
        return view('admin.category.edit')->with(compact(['id', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
    	$request->validate([
            'name' => 'required',              
        ],[
            'name.required' => 'Category Name is required',
        ]);

        $category->name = $request->name;
        $category->parent_id = $request->parent_category ? $request->parent_category : 0;
        if ($category->save()) {
            return redirect('category')->with(['success' => 'Category successfully updated.']);
        }

        return redirect()->back()->with(['message' => 'Unable to update category.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {	
    	$category = Category::findOrFail($id);
        if ($category->delete()) {
            return redirect()->back()->with(['message' => 'Category successfully deleted.']);
        }

        return redirect()->back()->with(['message' => 'Unable to delete category.']);
    }
}
