<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Models\PropertyType;
use App\Models\Property;
use App\Models\City;
use App\Models\Disclaimer;
use App\Models\Blog;
use App\Models\Popup;
use App\Models\Lsikeyword;
use Illuminate\Support\Facades\Session;
use App\Models\Favorite;
use auth;
use Illuminate\Support\ServiceProvider;

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
        View::composer('website/header', function ($view) {
            $recentBlogPosts = Blog::orderBy('created_at', 'desc')
                ->take(3)
                ->get();
            $popup = Popup::first();
            // print_r($popup);exit;
            $disclaimer = Disclaimer::first();
            $property_typemenu = PropertyType::all();
            $city_typemenu = City::all();
            $lsikeywordsectionone = Lsikeyword::where('type', 1)
                                        ->get();
            $lsikeywordsectiontwo = Lsikeyword::where('type', 2)
                                        ->get();
            $lsikeywordsectionthree = Lsikeyword::where('type', 3)
                                        ->get();
            $lsikeywordsectionfour = Lsikeyword::where('type', 4)
                                        ->get();
                                        
            $latitude = Session::get('latitude', null);
            $longitude = Session::get('longitude', null);
            if (Auth::check()) {
                $userFavoriteProperties = Favorite::where('user_id', Auth::user()->id)
                    ->with('property')
                    ->get();
                $favoriteProperties = $userFavoriteProperties->pluck('property');
            } else {
                $userFavoriteProperties = collect();
            }
            $top_localities = City::whereHas('properties', function ($query) {
                $query->topLocalities();
            })->take(5)->get();
            $cityNames = $top_localities->pluck('name');
            $footerproperty = Property::all();
            $view->with(['currentlatitude' => $latitude, 'currentlongitude' => $longitude,'footerproperty' => $footerproperty ,'recentBlogPosts' => $recentBlogPosts, 'cityNames' => $cityNames, 'disclaimer' => $disclaimer ,'property_typemenu' => $property_typemenu, 'city_typemenu' => $city_typemenu, 'userFavoriteProperties' => $userFavoriteProperties, 'popupdata' => $popup, 'lsikeywordsectionone' => $lsikeywordsectionone, 'lsikeywordsectiontwo' => $lsikeywordsectiontwo, 'lsikeywordsectionthree' => $lsikeywordsectionthree, 'lsikeywordsectionfour' => $lsikeywordsectionfour]);
        });
    }
}
