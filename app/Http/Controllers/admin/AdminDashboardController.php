<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Slider; 
use App\Models\Service_Category; 
use App\Models\Service; 
use App\Models\Setting; 
use App\Models\Blog; 
use App\Models\GlobalUrl; 
use App\Models\Menu; 
use Illuminate\Support\Facades\Validator;

class AdminDashboardController extends Controller
{
    public function index(){
        return view ('admin.dashboard');
    }

    public function settings(){
        $setting = Setting::first();
        // dd($setting->home_page_other_contents);
        return view('admin.pages.settings.business', compact('setting'));
    }

    public function settingsStore(Request $request){
        
        $setting = Setting::find($request->id);
        $imagePath = 'uploaded_files/setting'; 
        if($request->logo){

            $imageFilename1 = uploadImage($request->file('logo'), $imagePath);
        }else{
            $imageFilename1 = $setting->logo;
        }
        if($request->favicon){

            $imageFilename2 = uploadImage($request->file('favicon'), $imagePath);
        }else{
            $imageFilename2 = $setting->favicon;
        }
        if($request->meta_image){

            $imageFilename3 = uploadImage($request->file('meta_image'), $imagePath);
        }else{
            $imageFilename3 = $setting->meta_image;
        }

        $setting->title = $request->title;
        $setting->whatsapp = $request->whatsapp;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->address = $request->address;
        $setting->logo = $imageFilename1;
        $setting->favicon = $imageFilename2;
        $setting->meta_title = $request->meta_title;
        $setting->meta_description = $request->meta_description;
        $setting->meta_keywords = $request->meta_keywords;
        $setting->meta_image = $imageFilename3;
        $setting->header_scripts = $request->header_scripts;
        $setting->body_start_scripts = $request->body_start_scripts;
        $setting->body_end_scripts = $request->body_end_scripts;
        $setting->home_page_other_contents = $request->other_content;
        $setting->about_us = $request->about_us;
        $setting->privacy_policy = $request->privacy_policy;
        $setting->terms_and_policy = $request->terms;
        $setting->save();
        return response()->json(['message'=>'Settings Saved Successfully']);

    }

    public function slider(){
        
        $sliders = Slider::all();
        
        return view ('admin.pages.slider.index', compact('sliders'));
    }

    public function sliderNew(){
        
        $sliders = Slider::all();
        
    }

    public function afterSlider(){
        return view ('admin.pages.afterSlider.index');
    }

    public function Url(){
        $urls = GlobalUrl::select('id','url','track')->get();

        return view ('admin.pages.globalUrl.index', compact('urls'));
    }

    public function urlEdit($id){
        $url = GlobalUrl::select('id','url','track','is_active')->where('id', $id)->first();
        return $url; 

    }

    public function urlUpdate(Request $request, $id){
        $url = GlobalUrl::findorFail($id);
        $url ->title = $request->url;
        $url ->is_active = $request->is_active;
        $url->save();
        return response()->json(['success' => true, 'message' => 'Url updated successfully']);

    }

    public function menus(){
        return view ('admin.pages.menus.index');
    }

    public function sliderCreate(Request $request)
    {
      
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            // 'slider_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'serial' => 'required|integer',
            'link' => 'nullable|string|max:255',
            'video_link' => 'nullable|string|max:255',
            'is_active' => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imagePath = 'uploaded_files/slider'; // Set your destination path here

        // Upload the image using the helper function
        $imageFilename = uploadImage($request->file('slider_image'), $imagePath);

        // Create a new Slider instance and set the attributes
        $slider = new Slider();
        $slider->title = $request->input('title');
        $slider->image = $imageFilename; // Save the uploaded image filename
        $slider->serial = $request->input('serial');
        $slider->link = $request->input('link');
        $slider->video_link = $request->input('video_link');
        $slider->is_active = $request->input('is_active');
        
        // Save the slider data to the database
        $slider->save();
       
        return redirect()->route('admin.slider')->with('success', 'Slider created successfully.');
    }

    public function sliderDelete($id)
    {
        $slider = Slider::findOrFail($id);
        
        // Unlink and remove the associated image from storage
        $imagePath = 'uploaded_files/slider/' . $slider->image;
        if (file_exists(public_path($imagePath) && !is_null($slider->slider_image))) {
            unlink(public_path($imagePath));
        }
        
        // Delete the slider entry from the database
        $slider->delete();

        return redirect()->route('admin.slider')->with('success', 'Slider deleted successfully.');
    }

    public function sliderEdit($id){
        // return $id;
        $slider =  Slider::findorFail($id);
        return $slider;

    }

    public function sliderUpdate(Request $request, $id){
        // dd($request->slider_image);
        $slider = Slider::findorFail($id);
        $slider->title = $request->title;
        $slider->serial = $request->serial;
        $slider->link = $request->link;
        $slider->video_link = $request->video_link;
        $slider->is_active = $request->is_active;
        
        if($request->slider_image){
            $imagePath = 'uploaded_files/slider'; // Set your destination path here
            // Upload the image using the helper function
            $imageFilename = uploadImage($request->file('slider_image'), $imagePath);

            dd($imageFilename);
        }else{
           
            $imageFilename = $slider->image;
            // dd($imageFilename);
        }

        $slider->image = $imageFilename;
        $slider->update();
        // return $slider;
        // return response()->json(['success' => 'Slider updated successfully']);
        // Session::flash('success', 'Slider updated successfully');
        // return response()->json(['success' => true]);
        return response()->json(['success' => true, 'message' => 'Slider updated successfully']);

    }

    public function checkUrl(Request $request){
        {
            
            $url = $request->input('url');
            //$track = $request->input('track');
            $track = $request->input('urlPage');

            // Perform the URL check in your database
            if($track == 'category') {
                $checkFirstStep = Service_Category::where('url', $url)->first();
            }elseif($track == 'service'){
                $checkFirstStep = Service::where('url', $url)->first();
            }elseif($track == 'blogs'){
                $checkFirstStep = Blog::where('url', $url)->first();
            }elseif($track == 'menu'){
                $checkFirstStep = Menu::where('url', $url)->first();
            }
           
            if(!is_null($checkFirstStep)) {
                $response = [
                    'status' => 'yes',
                    'title' =>"This URL is Exist! Please try new.",
                ];
                return response()->json($response);
            }

            $urlCheck =  GlobalUrl::where('url', $url)->first();
                    
            if(!is_null($urlCheck)){
                $response = [
                    'status' => 'yes',
                    'title' =>"This URL is Exist into Global URL!",
                ];
            }
            else{
                $response = [
                    'status' => 'no'
                ]; 
            }
            
            return response()->json($response);
        }
    }


    

}

