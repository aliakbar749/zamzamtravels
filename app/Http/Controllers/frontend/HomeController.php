<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service_Category;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Setting;
use App\Models\Query;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(){
        $services = Service::select('id','title','start_price','image')->get();
        $serviceCategories = Service_Category::where('category_id', 0)->where('is_active', 1)->get();
        $sliders= Slider::select('id','title','image')->where('is_active',1)->get();
        $setting = Setting::all();
        return view ('frontend.home', compact('services','serviceCategories','sliders'));
    }

    public function allService($id){
        $services = Service::where('service_category_id' , $id)->where('is_active',1)->get();
        return view('frontend.pages.service.allService', compact('services'));
    }

    public function dynamicUrlAction($parameter){
        // dd($parameter);
        
            $urlInfo = DB::table('global_urls')->where('url', $parameter)->first(['id', 'url', 'tracking_id', 'track']);
            // dd($urlInfo);
            if(is_null($urlInfo)) {
    
            }
    
            if(optional($urlInfo)->track == 'service') {
                $service = Service::where('id', $urlInfo->tracking_id)->first();
                return view('frontend.pages.service.details', compact('service'));
            }else if(optional($urlInfo)->track == 'service_category') {
                $subCategories = Service_Category::select('id','title','url','short_description','image')->where('category_id', $urlInfo->tracking_id)->get();
                if(count($subCategories)>0){
                $title = Service_Category::select('id','title','breadcrumb_image')->where('id', $urlInfo->tracking_id)->first();
                
                return view('frontend.pages.serviceCategory.index', compact('subCategories','title'));
                }else{
                    $services= Service::where('service_category_id', $urlInfo->tracking_id)->get();
                    return view('frontend.pages.service.allService', compact('services'));
                }

            }else if(optional($urlInfo)->track == 'blogs') {
                $blog = Blog::select('id','title','url','descriptions','image')->where('id', $urlInfo->tracking_id)->first();
                
                return view('frontend.pages.blog.details', compact('blog'));
            }elseif ( $parameter == 'blog'){
                $blogs = Blog::all();
                return view('frontend.pages.blog.allBlog', compact('blogs'));
            }elseif ( $parameter == 'contact'){
                $setting = Setting::select('phone','email','address','logo')->first();
                return view('frontend.pages.contact.index', compact('setting'));
            }
            else{
                return 'something error ';
            }
    }

    public function queryStore(Request $request){
        // dd($request->all());
        $query = new Query;
        $query->name =$request->name;
        $query->service_id =$request->service_id;
        $query->email = $request->email;
        $query->phone = $request->phone;
        $query->nop = $request->nop;
        $query->mesasge = $request->message;
        $query->save();
        return redirect()->back();

    }

    public function dynamicUrl($parameter){
        return 'okkkkkkk';
    }
}
