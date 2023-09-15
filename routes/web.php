<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\ServiceCategoryController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\frontend\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     $services = App\Models\Service::all();
//     $serviceCategories = App\Models\Service_Category::all();
//     return view ('welcome', compact('services','serviceCategories'));
// });

Route::get('/', [HomeController::class,'home'])->name('frontend.home');
Route::get('/all-service/{parameter}',[HomeController::class,'allService'])->name('all.service');


// Route::get('/{content}/{parameter}',[HomeController::class,'dynamicUrl'])->name('dynamicUrl');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::prefix('admin')->group(function(){
        // Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/settings', [AdminDashboardController::class, 'settings'])->name('admin.business_settings');
        Route::post('/settings/storedata', [AdminDashboardController::class, 'settingsStore'])->name('admin.settingsStore');
        Route::get('/check-product-url', [AdminDashboardController::class, 'checkUrl'])->name('admin.checkurl');
    
        Route::get('/slider', [AdminDashboardController::class, 'slider'])->name('admin.slider');
        // Route::get('/slider-new', [AdminDashboardController::class, 'sliderNew'])->name('admin.slider');
        Route::post('/slider/create', [AdminDashboardController::class, 'sliderCreate'])->name('admin.slider.create');
        Route::delete('/slider/delete/{id}', [AdminDashboardController::class, 'sliderDelete'])->name('admin.slider.delete');
        Route::get('/edit-slider/{id}', [AdminDashboardController::class, 'sliderEdit'])->name('admin.slider.edit');
        Route::post('/update-slider/{id}', [AdminDashboardController::class, 'sliderUpdate'])->name('admin.slider.update');
        Route::get('/slider/after', [AdminDashboardController::class, 'afterSlider'])->name('admin.afterSlider');
        Route::get('/globalUrl', [AdminDashboardController::class, 'Url'])->name('admin.globalUrl.show');
        Route::get('/edit-url/{id}', [AdminDashboardController::class, 'urlEdit'])->name('admin.UrlEdit');
        Route::post('/update-url/{id}', [AdminDashboardController::class, 'urlUpdate'])->name('admin.UrlEdit');
       
        Route::resource('serviceCategory', ServiceCategoryController::class);
        Route::resource('service', ServiceController::class);
        Route::resource('blog', BlogController::class);
        Route::resource('testimonial', TestimonialController::class);
        Route::resource('menu', MenuController::class);
        // Route::get('/serviceCategories', [AdminDashboardController::class, 'serviceCategories'])->name('admin.serviceCategories');
        // Route::get('/serviceCategories', [ServiceCategoryController::class, 'createCategory'])->name('admin.createCategory');
    }); 
});



Route::get('/{parameter}',[HomeController::class,'dynamicUrlAction'])->name('dynamic.url');
Route::post('/query',[HomeController::class,'queryStore'])->name('query.submit');
