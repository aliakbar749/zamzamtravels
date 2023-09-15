<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\GlobalUrl;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd('ok');
        $blogs = Blog::all();
        return view ('admin.pages.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view ('admin.pages.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        // id`, `serial`, `type`, `url`, `title`, `image`, `descriptions`, `is_active`, `views`, `meta_title`, `meta_description`, `meta_keywords`, `tags
        $imagePath = 'uploaded_files/blogs'; 
        if($request->image){

            $imageFilename1 = uploadImage($request->file('image'), $imagePath);
        }
        $blog= new Blog;
        $blog->serial = $request->serial;
        $blog->title = $request->title;
        $blog->type = $request->type;
        $blog->is_active = $request->is_active;
        $blog->descriptions = $request->descriptions;
        $blog->image = $imageFilename1;
        $blog->url = $request->url;
        $blog->meta_title = $request['meta_title'];
        $blog->meta_keywords = $request['meta_keywords'];
        $blog->tags = $request['meta_tags'];
        $blog->meta_description = $request['meta_description'];
        $blog->save();

        $blogid = $blog->id;
        $newUrl = new GlobalUrl;
        $newUrl->tracking_id = $blogid;
        $newUrl->track = 'blogs';
        $newUrl->url = $request->url;
        $newUrl->is_active = 1;
        $newUrl->save();

        return response()->json(['message' => 'Blog saved successfully']);
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
        $blog = Blog::find($id);
        return view ('admin.pages.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($id);
        $blog = Blog::find($id);
        // `serial`, `type`, `url`, `title`, `image`, `descriptions`, `is_active`, `views`, `meta_title`, `meta_description`, `meta_keywords`, `tags`
        $imagePath = 'uploaded_files/blogs'; 
        if($request->image){

            $imageFilename1 = uploadImage($request->file('image'), $imagePath);
        }
        $blog->serial = $request->serial;
        $blog->title = $request->title;
        $blog->type = $request->type;
        $blog->is_active = $request->is_active;
        $blog->descriptions = $request->descriptions;
        $blog->image = $imageFilename1;
        $blog->url = $request->url;
        $blog->meta_title = $request['meta_title'];
        $blog->meta_keywords = $request['meta_keywords'];
        $blog->tags = $request['meta_tags'];
        $blog->meta_description = $request['meta_description'];
        $blog->save();

        
        $newUrl = GlobalUrl :: where('tracking_id',$id)->first();
        $newUrl->url = $request->url;
        $newUrl->save();
        return response()->json(['message'=> 'Blog updated successfully']);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
