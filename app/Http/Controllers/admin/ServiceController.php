<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\GlobalUrl;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view ('admin.pages.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view ('admin.pages.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->file('image'));
        $imagePath = 'uploaded_files/service'; // Set your destination path here
        $filePath = 'uploaded_files/service/file'; // Set your destination path here

        // Upload the image using the helper function
        if($request->image){

            $serviceImage = uploadImage($request->image, $imagePath);
        }
        if($request->breadcrumb_image){
            $breadcrumbImage = uploadImage($request->breadcrumb_image , $imagePath);
        }
        if($request->necessary_file){
            $file = uploadImage($request->necessary_file, $filePath);
        }

        // $serviceImage = uploadImage($request->file('image'), $imagePath);
        // $breadcrumbImage = uploadImage($request->file('breadcrumb_image'), $imagePath);
        // $file = uploadImage($request->file('necessary_file'), $filePath);

       $service = new Service();
       $service->service_category_id = $request->service_category;
       $service->title = $request->title;
       $service->subtitle = $request->subtitle;
       $service->url = $request->url;
       $service->serial = $request->serial;
       $service->is_active = $request->is_active;
       $service->is_popular = $request->is_popular;
       $service->package_overview = $request->package_overview;
       $service->itinerary = $request->itinerary;
       $service->notes_and_policy = $request->notes_and_policy;
       $service->package_pricing = $request->package_pricing;
       $service->short_description = $request->short_description;
       $service->long_description = $request->long_description;
       $service->video_link = $request->you_tube_link;
       $service->start_price = $request->start_price;
       $service->meta_title = $request->meta_title;
       $service->meta_keywords = $request->meta_keywords;
       $service->tags = $request->meta_tags;
       $service->meta_description = $request->meta_description;
       $service->image= $serviceImage;
       $service->breadcrumb_image= $breadcrumbImage;
       $service->pdf_file= $file;
       $service->save();

       $serviceId = $service->id;
       $newUrl = new GlobalUrl;
        $newUrl->tracking_id = $serviceId;
        $newUrl->track = 'service';
        $newUrl->url = $request->url;
        $newUrl->is_active = 1;
        $newUrl->save();
        
        return redirect()->back()->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd($id);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::find($id);
        return view ('admin.pages.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($id);
        $imagePath = 'uploaded_files/service'; // Set your destination path here
        $filePath = 'uploaded_files/service/file'; // Set your destination path here

        // Upload the image using the helper function
        if($request->image){

            $serviceImage = uploadImage($request->file('image'), $imagePath);
        }
        if($request->breadcrumb_image){
            $breadcrumbImage = uploadImage($request->file('breadcrumb_image'), $imagePath);
        }
        if($request->breadcrumb_image){
            $file = uploadImage($request->file('necessary_file'), $filePath);
        }

       $service = Service::find($id);
       $service->service_category_id = $request->service_category;
       $service->title = $request->title;
       $service->subtitle = $request->subtitle;
       $service->url = $request->url;
       $service->serial = $request->serial;
       $service->is_active = $request->is_active;
       $service->is_popular = $request->is_popular;
       $service->package_overview = $request->package_overview;
       $service->itinerary = $request->itinerary;
       $service->notes_and_policy = $request->notes_and_policy;
       $service->package_pricing = $request->package_pricing;
       $service->short_description = $request->short_description;
       $service->long_description = $request->long_description;
       $service->video_link = $request->you_tube_link;
       $service->start_price = $request->start_price;
       $service->meta_title = $request->meta_title;
       $service->meta_keywords = $request->meta_keywords;
       $service->tags = $request->meta_tags;
       $service->meta_description = $request->meta_description;

       $service->image= $serviceImage;
       $service->breadcrumb_image= $breadcrumbImage;
       $service->pdf_file= $file;

       $service->save();

       $newUrl = GlobalUrl :: where('tracking_id',$id)->first();
       $newUrl->url = $request->url;
        $newUrl->save();
        return response()->json(['message'=> 'Service updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
