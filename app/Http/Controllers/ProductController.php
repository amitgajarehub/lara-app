<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index')->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create')->with(compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',              
            'price' => 'required',              
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5084',
        ],[
            'name.required' => 'Product Name is require',
            'price.required' => 'Product price is require',
            'image.required' => 'Please product image',
        ]);

        $product = new Product;
        $product->name=$request->name;
        $product->price=$request->price;
        $product->category=$request->category;
        
        $image = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->move(public_path('products'), $image);
        $product->image = $image;
        if ($product->save()) {
            return redirect()->back()->with('message', 'Product created successfully');
        }
        return redirect()->back()->with(['message' => 'Unable to create product, try again.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        echo "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.product.edit')->with(compact(['product', 'products', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {   
        $request->validate([
            'name' => 'required',              
            'price' => 'required',              
        ],[
            'name.required' => 'Product Name is require',
            'price.required' => 'Product price is require',
        ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->category = $request->category;
        
        if ($request->has('image')) {
            $path = public_path('products/'.$product->image);
            if (file_exists($path)) {
                unlink($path);
            }
            $image = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->move(public_path('products'), $image);
            $product->image = $image;
        }

        if ($product->save() ) {
            return redirect()->route('product.index')->with(['success' => 'product successfully updated.']);
        }

        return redirect()->back()->with(['fail' => 'Unable to update product.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {        
        if ($product->delete()) {
            return redirect()->back()->with(['message' => 'Product successfully deleted.']);
        }
        return redirect()->back()->with(['message' => 'Unable to delete product.']);
    }
}
