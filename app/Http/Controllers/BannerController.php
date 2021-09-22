<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::get();
        return view('admin.banners.index', compact('banners'));
    }

    public function Banner()
    {
        $banners = Banner::get();
        $categories = Category::get();
        return view('home', compact(['banners', 'categories']));
    }

    public function add(Request $req)
    {
        $req->validate([
            'title' => 'required',              
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5084',
        ],[
            'title.required' => 'Title is required',
            'image.required' => 'Please choose image',
        ]);

        $banner = new Banner;
        $banner->title=$req->title;
        $banner->url=$req->url;
        
        $image = $req->file('image')->getClientOriginalName();
        $path = $req->file('image')->move(public_path('banners'), $image);
        $banner->image = $image;
        if ($banner->save()) {
            return redirect()->back()->with('message', 'Banner created successfully');
        }
    }

    public function show($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $req)
    {
        $banner = Banner::find($req->id);
     
        $req->validate([
            'title' => 'required',              
            'image' => 'image|mimes:jpeg,png,jpg|max:5084',
        ],[
            'title.required' => 'Title is required',
        ]);
            
        $banner->title = $req->title;
        $banner->url = $req->url;
       
        //$banner->status = $req->status;
        
        if ($req->has('image')) {
            if (file_exists($banner->image)) {
                unlink($banner->image);
            }
            $image = $req->file('image')->getClientOriginalName();
            $path = $req->file('image')->move(public_path('banners'), $image);
            $banner->image = $image;
        }
        
        if ($banner->update()) {
            return redirect('banner')->with('message', 'Banner Updated ...');
        }
    }

    public function delete($id)
    {
        $banner = Banner::findOrFail($id);
        if (file_exists($banner->image)) {
           unlink($banner->image);
        }
        $banner->delete();
        return redirect()->back()->with('message', 'Banner deleted successfully');
    }
}
