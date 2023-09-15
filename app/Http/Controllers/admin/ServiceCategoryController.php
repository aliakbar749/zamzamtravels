<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service_Category;
use App\Models\GlobalUrl;
use Illuminate\Cache\RedisTagSet;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicecategories = Service_Category::all();
        return view ('admin.pages.serviceCategories.index',compact('servicecategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.pages.serviceCategories.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $imagePath = 'uploaded_files/service_categories'; 
        if($request->image){

            $imageFilename1 = uploadImage($request->file('image'), $imagePath);
        }
        if($request->breadcrumb_image){
            $imageFilename2 = uploadImage($request->file('breadcrumb_image'), $imagePath);
        }
        $serviceCategory = new Service_Category();
        // if($request->service_category){
        //     $serviceCategory->category_id = $request['service_category'];
        // }else{
        //     $serviceCategory->category_id = null;
        // }
        $serviceCategory->category_id = $request['service_category'];
        $serviceCategory->title = $request['title'];
        $serviceCategory->subtitle = $request['subtitle'];
        $serviceCategory->url = $request['url'];
        $serviceCategory->serial = $request['serial'];
        $serviceCategory->is_active = $request['is_active'];
        $serviceCategory->short_description = $request['short_descriptions'];
        $serviceCategory->long_description = $request['long_descriptions'];
        $serviceCategory->meta_title = $request['meta_title'];
        $serviceCategory->meta_keywords = $request['meta_keywords'];
        $serviceCategory->tags = $request['meta_tags'];
        $serviceCategory->meta_description = $request['meta_description'];
        $serviceCategory->image = $imageFilename1 ?? null;
        $serviceCategory->breadcrumb_image = $imageFilename2 ?? null;
        $serviceCategory->save();
        $serviceCategoryId = $serviceCategory->id;
        // $tags = [];
        // foreach ($request->get('tags') as $tagId) {
        //     $tags[] = [
        //         'type' => 'service_category',
        //         'tag_id' => $tagId,
        //         'tracking_id' => $serviceCategoryId,
        //     ];
        // }
        // DB::table('seo_tags')->insert($tags);
        // $keywords = [];
        // foreach ($request->get('keywords') as $keywordID) {
        //     $keywords[] = [
        //         'type' => 'service_category',
        //         'keyword_id' => $keywordID,
        //         'tracking_id' => $serviceCategoryId,
        //     ];
        // }

        // DB::table('seo_keywords')->insert($keywords);

        $newUrl = new GlobalUrl;
        $newUrl->tracking_id = $serviceCategoryId;
        $newUrl->track = 'service_category';
        $newUrl->url = $request->url;
        $newUrl->is_active = 1;
        $newUrl->save();

        return response()->json(['message' => 'category saved successfully']);
        // $serviceCategory->tags()->saveMany($tags);
        return view ('admin.pages.serviceCategories.create');

        // Set other fields here

        //
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
        // return ($id);
        $serviceCategory =  Service_Category::find($id);
        return view ('admin.pages.serviceCategories.edit', compact('serviceCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->image);  
        
        $serviceCategory =  Service_Category::find($id);
        // dd($serviceCategory);
        if($request->service_category){
            $serviceCategory->category_id = $request['service_category'];
        }

        $imagePath = 'uploaded_files/service_categories'; // Set your destination path here
         // Set your destination path here

        // Upload the image using the helper function
        if($request->image){

            $image = uploadImage($request->file('image'), $imagePath);
        }else{
            $image= $serviceCategory->image;
        }
        if($request->breadcrumb_image){

            $breadcrumb_image = uploadImage($request->file('breadcrumb_image'), $imagePath);
        }else{
            $breadcrumb_image= $serviceCategory->breadcrumb_image;
        }
       
        $serviceCategory->title = $request->input('title');
        $serviceCategory->subtitle = $request->input('subtitle');
        $serviceCategory->url = $request->input('url');
        $serviceCategory->serial = $request->input('serial');
        $serviceCategory->is_active = $request->input('is_active');
        $serviceCategory->short_description = $request->input('short_descriptions');
        $serviceCategory->long_description = $request->input('long_descriptions');
        $serviceCategory->meta_title = $request->input('meta_title');
        $serviceCategory->image = $image;
        $serviceCategory->breadcrumb_image = $breadcrumb_image;
        // $serviceCategory->meta_keywords = $request->input('meta_key');
        $serviceCategory->meta_description = $request->input('meta_description');
        $serviceCategory->save();
        return response()->json(['success' => true, 'message' => 'Service Category updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
