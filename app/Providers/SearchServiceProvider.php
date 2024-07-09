<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Blog;
use App\Models\PropertyType;
use App\Models\City;
use Illuminate\Support\ServiceProvider;

class SearchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('website/filterbar', function ($view) {
            $property_typemenu = PropertyType::all();
            $city_typemenu = City::all();
            $view->with(['property_typemenu' => $property_typemenu, 'city_typemenu' => $city_typemenu]);
        });
    }
}
