<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Service;
use App\Models\Service_Category;
use App\Models\Slider;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->share('services', Service::all());
        view()->share('serviceCategories', Service_Category::where('category_id', 0)->where('is_active', 1)->get());
        view()->share('sliders', Slider::all());
        view()->share('setting', Setting::first());
    }
}
