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

    // public function store_count($request, $type)
    // {
    //     //using array limit
    //     return Banner::where('banner_type', $type)
    //     ->where('isActive', 1)->count() < $this->limits[$type] && $request->isActive == 1;
    // }

    // public function update_count($banner, $type)
    // {
    //     return Banner::whereNotIn('id', [$banner->id])
    //     ->where('isActive', 1)
    //     ->where('type', $banner->banner_type)->count() < $this->limits[$type] && $banner->isActive == 1;
    // }

    // public function store(Request $request)
    // {
    //     //validating form data
    //     $data = $request->validate([
    //         'title' => "required",
    //         'url' => "required",
    //         'image' => "required",
    //         'image_title' => "max:255",
    //         'image_alt' => "max:255",
    //         'banner_type' => "required|in:small,medium,large,news",
    //         'isActive' => "nullable|in:0,1" //active or not
    //     ]);

    //     //validating images active count
    //     if (!$this->store_count($request, $request->banner_type)) {
    //     return redirect()->back()->withInput($request->all())
    //         ->withErrors(['isActive' => ' نمیتوان بیشتر از ' . $this->limits[$request['banner_type']] . ' عکس برای این بنر آپلود کرد! ']);
    // }

    //     Banner::create($data);
    //     return redirect(route('admin.banners.index'));
    // }

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
