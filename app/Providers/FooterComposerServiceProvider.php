<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Blog;
use App\Models\PropertyType;
use App\Models\PropertyStatus;
use App\Models\PropertyView;
use App\Models\City;
use App\Models\Area;
use App\Models\Property;
use auth;
use Illuminate\Support\ServiceProvider;

class FooterComposerServiceProvider extends ServiceProvider
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
        View::composer('footer', function ($view) {

            $recentBlogPosts = Blog::orderBy('created_at', 'desc')
                ->take(3)
                ->get();
            $view->with(['recentBlogPosts' => $recentBlogPosts]);
        });
        View::composer('website/filterbar', function ($view) {
            $property_typemenu = PropertyType::all();
            $city_typemenu = City::all();
            $area = Area::all();
            $property_status = PropertyStatus::all();
            $property_view = PropertyView::all();
            $view->with(['area' => $area, 'property_typemenu' => $property_typemenu, 'city_typemenu' => $city_typemenu, 'property_status' => $property_status, 'property_view' => $property_view]);
        });
        View::composer('website/homepagebanner', function ($view) {
            $property_typemenu = PropertyType::all();
            $city_typemenu = City::all();
            $area = Area::all();
            $property_status = PropertyStatus::all();
            $property_view = PropertyView::all();
            $view->with(['area' => $area, 'property_typemenu' => $property_typemenu, 'city_typemenu' => $city_typemenu, 'property_status' => $property_status, 'property_view' => $property_view]);
        });
        View::composer('admin/master', function ($view) {
        $user = Auth::user();
        if ($user->role == "admin") {
            $notifications = [];
            $properties = Property::with('propertyenquiries')->get();
            foreach ($properties as $property) {
                foreach ($property->propertyenquiries as $enquiry) {
                    if ($enquiry->notification == 1){
                        $notificationCount = $enquiry->notification; // Assuming 'notification' is a property of PropertyEnquiry
                            $notifications[] = [
                                'property_name' => $property->title,
                                'enquiry_name' => $enquiry->name,
                                'enquiry_id' => $enquiry->id,
                                'notification_count' => $notificationCount,
                            ];
                    }
                }
            }
        } elseif($user->role == "seller") {
            $properties = Property::where('user_id', $user->id)->with('propertyenquiries')->get();
            $notifications = [];

            foreach ($properties as $property) {
                foreach ($property->propertyenquiries as $enquiry) {
                    if ($enquiry->notification == 1) {
                        $notificationCount = $enquiry->notification;
                        $notifications[] = [
                            'property_name' => $property->title,
                            'enquiry_name' => $enquiry->name,
                            'enquiry_id' => $enquiry->id,
                            'notification_count' => $notificationCount,
                        ];
                    }
                }
            }
        } else {
            $properties = Property::where('user_id', $user->id)->with('propertyenquiries')->get();
            $notifications = [];

            foreach ($properties as $property) {
                foreach ($property->propertyenquiries as $enquiry) {
                    if ($enquiry->notification == 1) {
                        $notificationCount = $enquiry->notification;
                        $notifications[] = [
                            'property_name' => $property->title,
                            'enquiry_name' => $enquiry->name,
                            'enquiry_id' => $enquiry->id,
                            'notification_count' => $notificationCount,
                        ];
                    }
                }
            }
        }
            $view->with(compact('notifications'));
        });
    }
}
