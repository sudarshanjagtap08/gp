<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Tag;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Checklist;
use App\Models\PropertyType;
use App\Models\PropertyStatus;
use App\Models\PropertyView;
use App\Models\Property;
use App\Models\What_do_we_do;
use App\Models\Benefit;
use App\Models\Favorite;
use App\Models\Key_Service;
use App\Models\Propertyseen;
use App\Models\Seo;
use App\Models\Blogseo;
use App\Models\About;
use App\Models\Propertyenquiry;
use App\Models\Actualimage;
use App\Models\Layoutimage;
use App\Models\Aminity;
use App\Models\Aminityid;
use App\Models\Locationconnectivity;
use App\Models\Youtube;
use App\Models\Subscribe;
use App\Models\Enquiry;
use App\Models\Exclusive_project;
use App\Models\Newlaunchprojects;
use App\Models\Readypossessionproject;
use App\Models\Toparea;
use App\Models\Propertyfeature;
use App\Models\Blogcomment;
// use App\Models\PropertyView;
use Carbon\Carbon; // Add this line
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WebsiteController extends Controller
{
    public function webindex(){
        return view('website/home');
    }
    public function saveLocation(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        // Save the latitude and longitude in the session
        Session::put('latitude', $latitude);
        Session::put('longitude', $longitude);

        return response()->json(['status' => 'Location saved']);
    }
    public function locationwisesearch(Request $request)
    {
        $city_name = City::all();
        $property_views = PropertyView::all();
        $property_types = PropertyType::all();
        $lat = Session::get('latitude', null);
        $lng = Session::get('longitude', null);
        $radius = 50;
        // Query to fetch properties within the given radius
        $property  = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
            ->selectRaw("*, (6371 * acos(cos(radians(?)) * cos(radians(lat)) * cos(radians(lng) - radians(?)) + sin(radians(?)) * sin(radians(lat)))) AS distance", [$lat, $lng, $lat])
            ->having('distance', '<', $radius)
            ->orderBy('distance')
            ->get();
        $userFavoritePropertyIds = [];
        $userPropertyEnquiryIds = [];
        $userPropertyseenIds = [];
        if (Auth::check()) {
            $userFavoritePropertyIds = Favorite::where('user_id', Auth::user()->id)->pluck('property_id');
            $userPropertyEnquiryIds = Propertyenquiry::where('user_id', Auth::user()->id)->pluck('property_id');
            $userPropertyseenIds = Propertyseen::where('user_id', Auth::user()->id)->pluck('property_id');
        }
        return view('website.locationwisesearch', compact('property_views','city_name','property_types','property', 'userFavoritePropertyIds', 'userPropertyEnquiryIds', 'userPropertyseenIds'));
    }
    
    public function index()
    { 
        
        $property = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
            ->orderBy('id', 'desc')
            ->get();
        $categoryId = 2;
        $handpickedproperty = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
                ->whereHas('property_categoryids', function ($query) use ($categoryId) {
                    $query->where('property_category_id', $categoryId);
                })
                ->get();        
        $categoryIdHan = 1;
        $featured_properties = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
                ->whereHas('property_categoryids', function ($query) use ($categoryIdHan) {
                    $query->where('property_category_id', $categoryIdHan);
                })
            ->orderBy('id', 'desc')
            ->get();
        $exclusive_project = Exclusive_project::with('property.country', 'property.state', 'property.city', 'property.property_type', 'property.property_view', 'property.property_statuses', 'property.images')
                                ->get();
        $newlaunchprojects = Newlaunchprojects::with('property.country', 'property.state', 'property.city', 'property.property_type', 'property.property_view', 'property.property_statuses', 'property.images')
                                ->get();
        $readypossessionprojects = Readypossessionproject::with('property.country', 'property.state', 'property.city', 'property.property_type', 'property.property_view', 'property.property_statuses', 'property.images')
                                ->get();
        // print_r($newlaunchprojects);exit;
        $categoryIdmarket = 3;
        $deal_market = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
                ->whereHas('property_categoryids', function ($query) use ($categoryIdmarket) {
                    $query->where('property_category_id', $categoryIdmarket);
                })
            ->get(); 
        $blog = Blog::with('blogcategories.categories')->get();
        $propertytype = PropertyType::all();
        $top_localities = City::whereHas('properties', function ($query) {
                $query->topLocalities();
            })
            ->take(8)->get();
        $emerging_localities = City::whereHas('properties', function ($query) {
                $query->emergingLocalities();
            })
            ->take(8)->get();
        $key_service = Key_Service::all();
        $userFavoritePropertyIds = [];
        $userPropertyEnquiryIds = [];
        $userPropertyseenIds = [];
        if (Auth::check()) {
            $userFavoritePropertyIds = Favorite::where('user_id', Auth::user()->id)->pluck('property_id');
            $userPropertyEnquiryIds = Propertyenquiry::where('user_id', Auth::user()->id)->pluck('property_id');
            $userPropertyseenIds = Propertyseen::where('user_id', Auth::user()->id)->pluck('property_id');
        }
        $about = About::first();
        $related_post = Blog::with('user','blogcategories.categories')
                            ->orderBy('id', 'desc') 
                            ->get();
       $property_city_id = "1";
        $trustedproperties = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
                    ->Where('top_localities', 1)
                    ->limit(3)
                    ->get();
        return view('website/index', compact('property', 'blog', 'handpickedproperty', 'featured_properties', 'deal_market', 'propertytype', 'top_localities', 'emerging_localities', 'key_service', 'userFavoritePropertyIds', 'userPropertyEnquiryIds', 'userPropertyseenIds', 'about','related_post','exclusive_project','trustedproperties','newlaunchprojects','readypossessionprojects')); 
    }
    public function propertyDetails($propertySlug) 
    { 
        $property = Property::with('country','state','city','property_type','property_statuses','property_view', 'images', 'youtubes')
                                ->where('slug', $propertySlug)->firstOrFail();
        $property_id = $property->id;        
        $property_city = $property->city->name;  
        $propertytype = PropertyType::all();
        $properties = Property::all();
        $actualimages = Actualimage::where('property_id', $property_id)->get();
        $layoutimages = Layoutimage::where('property_id', $property_id)->get();
        $youtube = Youtube::where('property_id', $property_id)->get();
        $jsonProperties = json_encode($properties);
        $userPropertyEnquiryIds =[];
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $userPropertyEnquiryIds = Propertyenquiry::where('user_id', Auth::user()->id)->pluck('property_id');
            $existingRecord = Propertyseen::where('user_id', $user_id)
                ->where('property_id', $property_id)
                ->first();
            if (!$existingRecord) 
            {
                $propertyseen = new Propertyseen;
                $propertyseen->property_id = $property_id;
                $propertyseen->user_id = $user_id;
                $propertyseen->save();
            }
        }
        $propertydata = Seo::where('property_id', $property_id)->first();
        $metatitle = $propertydata ? $propertydata->metatitle : '';
        $metadescription = $propertydata ? $propertydata->metadescription : '';
        $metakeyword = $propertydata ? $propertydata->metakeyword : '';
        $canonical = $propertydata ? $propertydata->canonical : '';
        $schemacode = $propertydata ? $propertydata->schemacode : '';
        $aminities = Aminityid::where('property_id', $property_id)
                    ->with('aminitys') // Eager load the relationship
                    ->get(); 
        $locationadvantage = Locationconnectivity::where('property_id', $property_id)
                    ->get(); 
        $shortlistedCount = Favorite::where('property_id', $property_id)->count();
        $propertyseenCount = Propertyseen::where('property_id', $property_id)->count();
        $propertyenquiryCount = Propertyenquiry::where('property_id', $property_id)->count();
        $categoryIdHan = 1;
        $featured_properties = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
                                        ->where('property_type_id', $property->property_type_id)
                                        ->where('area_id', $property->area_id)
                                        ->where('id', '!=', $property->id)
                                        ->get();  
        $propertyfeatures = Propertyfeature::where('property_id', $property_id)
                            ->get(); 
        return view('website/propertydetails', compact( 'featured_properties', 'property', 'propertytype','properties','userPropertyEnquiryIds','jsonProperties','metatitle','metadescription','metakeyword','canonical','schemacode','actualimages','layoutimages','aminities','youtube','locationadvantage','propertyenquiryCount','propertyseenCount','shortlistedCount','propertyfeatures'));
    }
    public function about()
    { 
        $blog = Blog::with('blogcategories.categories')->latest()->get();
        $what_do_we_do = What_do_we_do::all();
        $about = About::skip(1)->take(1)->first();
        return view('website/about', compact('blog', 'what_do_we_do', 'about')); 
    }
    public function blog()
    { 
        $blogs = Blog::with('blogcategories.categories')
                    ->orderBy('id', 'desc')
                    ->paginate(9);
        $recent_post_titles = Blog::orderBy('id', 'desc')->take(5) ->pluck('title');
        $topareas = Toparea::all();
        return view('website/blog', compact('blogs', 'recent_post_titles', 'topareas')); 
    }
    public function contact()
    {
        return view('website/contact'); 
    }    
    public function searchResults(Request $request)
    {
        $keyword = $request->input('keyword');
        $landCity = $request->input('landCity');
        $landArea = $request->input('landArea');
        $landStatus = $request->input('landStatus');
        $landType = $request->input('landType');
        $landView = $request->input('landView');
        $minArea = $request->input('minArea');        
        $maxArea = $request->input('maxArea'); 
        $minprice = $request->input('min_price'); 
        $maxprice = $request->input('max_price'); 
        $propertyID = $request->input('propertyID'); 
        $propertytypecounts = PropertyType::withCount('properties')->get();
        $propertystatuscounts = PropertyStatus::withCount('properties')->get();
        $filteredData = Property::query()
        ->select('properties.*')
        ->leftJoin('states', 'properties.state_id', '=', 'states.id')
        ->leftJoin('cities', 'properties.city_id', '=', 'cities.id') // Join the 'cities' table
        // ->leftJoin('areas', 'properties.area_id', '=', 'areas.id') // Join the 'areas' table
        ->where(function ($query) use ($keyword) {
            $query->orWhere('states.name', 'like', '%' . $keyword . '%') // Use 'states.name' here
                  ->orWhere('cities.name', 'like', '%' . $keyword . '%') // Use 'cities.name' here
                //   ->orWhere('areas.name', 'like', '%' . $keyword . '%') // Use 'areas.name' here
                  ->orWhere('address', 'like', '%' . $keyword . '%')
                  ->orWhere('title', 'like', '%' . $keyword . '%');
        })
        ->when($landCity !== 'All Cities', function ($query) use ($landCity) {
            return $query->where('city_id', $landCity);
        })
        ->when($landArea !== 'All Areas', function ($query) use ($landArea) {
            return $query->where('area_id', $landArea);
        })
        ->when($landStatus !== 'landStatus', function ($query) use ($landStatus) {
            return $query->where('property_status_id', $landStatus);
        })
        ->when($landType !== 'landType', function ($query) use ($landType) {
            return $query->where('property_type_id', $landType);
        })
        ->when($landView !== 'landView', function ($query) use ($landView) {
            return $query->where('property_view_id', $landView);
        })
        ->when($minArea !== null && $minArea !== "", function ($query) use ($minArea) {
            return $query->where('area', '>=', $minArea);
        })
        ->when($maxArea !== null && $maxArea !== "", function ($query) use ($maxArea) {
            return $query->where('area', '<=', $maxArea);
        })
        ->when($minprice !== null && $minprice !== "", function ($query) use ($minprice) {
            return $query->where('price', '>=', $minprice);
        })
        ->when($maxprice !== null && $maxprice !== "", function ($query) use ($maxprice) {
            return $query->where('price', '<=', $maxprice);
        })
        ->when($propertyID !== null, function ($query) use ($propertyID) {
            return $query->where('properties.id', $propertyID);
        })
        ->get();
        $propertycount = count($filteredData);
        
        $categoryIdHan = 1;
            $featured_properties = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
                    ->whereHas('property_categoryids', function ($query) use ($categoryIdHan) {
                        $query->where('property_category_id', $categoryIdHan);
                    })
                   
                ->get();
        $city_name = City::all();
        $property_views = PropertyView::all();
        $property_types = PropertyType::all();
        return view('website/searchResults', compact('property_types','property_views','city_name','filteredData', 'propertycount', 'propertytypecounts', 'propertystatuscounts','featured_properties'));
    }
    public function searchResultsSidebar(Request $request)
    {
        $categoryIdHan = 1;
        $featured_properties = Property::with([
            'country', 'state', 'city', 'property_type', 'property_view',
            'property_statuses', 'images', 'property_categoryids.property_categories'
        ])
        ->whereHas('property_categoryids', function ($query) use ($categoryIdHan) {
            $query->where('property_category_id', $categoryIdHan);
        })
        ->get();
        $city_id = $request->city_id;
        $property_view_id = $request->property_view_id;
        $property_type_id = $request->property_type_id;
        $MinPrice = $request->input('min_price');
        $priceUnit = $request->input('price_unit');
        $maxPrice = $request->input('max_price');
        $maxpriceUnit = $request->input('maxprice_unit');
        if($priceUnit == "Thousand") {
            $min_price = $MinPrice * 1000;
        } elseif($priceUnit == "Lakh") {
            $min_price = $MinPrice * 100000;
        } elseif($priceUnit == "Cr") {
            $min_price = $MinPrice * 10000000;
        } else {
            $min_price = "";
        }
        if($maxpriceUnit == "Thousand") {
            $max_price = $maxPrice * 1000;
        } elseif($maxpriceUnit == "Lakh") {
            $max_price = $maxPrice * 100000;
        } elseif($maxpriceUnit == "Cr") {
            $max_price = $maxPrice * 10000000;
        } else {
            $max_price = "";
        }
        
        $area = $request->input('area');
        $areaUnit = $request->input('area_unit');
        if ($areaUnit == "Sqft") {
            $areasqft = $area;
        } elseif ($areaUnit == "Sq.m") {
            $areasqft = $area * 10.764;
        } elseif ($areaUnit == "Acre") {
            $areasqft = $area * 43560;
        } else {
            $areasqft = "";
        }
        $city_name = City::all();
        $city = City::find($city_id);
        $propertycityname = $city ? $city->name : null;
        $property_views = PropertyView::all();
        $property_types = PropertyType::all();
        $properties = Property::with(['country', 'state', 'city', 'property_type', 'property_view','property_statuses', 'images', 'property_categoryids.property_categories'])
            ->when($city_id, function ($query) use ($city_id) {
                return $query->where('city_id', $city_id);
            })
            ->when($property_view_id, function ($query) use ($property_view_id) {
                return $query->where('property_view_id', $property_view_id);
            })
            ->when($property_type_id, function ($query) use ($property_type_id) {
                return $query->where('property_type_id', $property_type_id);
            })
            ->when($min_price, function ($query) use ($min_price) {
                return $query->where('actual_price', '>=', $min_price);
            })
            ->when($max_price, function ($query) use ($max_price) {
                return $query->where('actual_price', '<=', $max_price);
            })
            ->when($areasqft, function ($query) use ($areasqft) {
                return $query->where('plotareafrom', '<=', $areasqft)
                             ->where('plotareato', '>=', $areasqft);
            })
        ->get();
        // Counting property types
        $propertytypecounts = PropertyType::withCount('properties')->get();
        
        $propertycount = count($properties);
    
        // Fetching user-related data if authenticated
        $userFavoritePropertyIds = [];
        $userPropertyEnquiryIds = [];
        $userPropertyseenIds = [];
    
        if (Auth::check()) {
            $userId = Auth::id();
            $userFavoritePropertyIds = Favorite::where('user_id', $userId)->pluck('property_id');
            $userPropertyEnquiryIds = Propertyenquiry::where('user_id', $userId)->pluck('property_id');
            $userPropertyseenIds = Propertyseen::where('user_id', $userId)->pluck('property_id');
        }
    
        return view('website.search-sidebar', compact(
            'properties', 'propertycount', 'propertytypecounts',
            'userFavoritePropertyIds', 'userPropertyEnquiryIds', 'userPropertyseenIds',
            'city_name', 'property_views', 'property_types', 'featured_properties', 'propertycityname'
        ));
    }


    public function city() 
    { 
        $top_localities = City::whereHas('properties', function ($query) {
            $query->topLocalities();
        })->get();
        $topproperty = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
                        ->where('top_localities', 1)
                        ->get();
        $userFavoritePropertyIds = [];
        $userPropertyEnquiryIds = [];
        $userPropertyseenIds = [];
        if (Auth::check()) {
            $userFavoritePropertyIds = Favorite::where('user_id', Auth::user()->id)->pluck('property_id');
            $userPropertyEnquiryIds = Propertyenquiry::where('user_id', Auth::user()->id)->pluck('property_id');
            $userPropertyseenIds = Propertyseen::where('user_id', Auth::user()->id)->pluck('property_id');
        }            
        return view('website/city', compact('top_localities', 'topproperty','userFavoritePropertyIds','userPropertyEnquiryIds','userPropertyseenIds')); 
    }
    public function area($parameter) 
    {
        $data = [ 'pagename' => $parameter, ];
        return view('website/area-city',$data); 
    }
    public function blogDetails(Request $request , $blogSlug) 
    { 
        $blogtitle = str_replace('-', ' ', $blogSlug);         
        $blog = Blog::with('user','blogcategories.categories','blogtags.tags')
                ->where('title', $blogtitle)->firstOrFail();   
                
        $wordsPerMinute = 200;
        $wordCount = str_word_count(strip_tags($blog->description));
        $totalReadTimeSeconds = ceil($wordCount / $wordsPerMinute) * 60;
        $readTimeMinutes = floor($totalReadTimeSeconds / 60);
        $currentBlogId = $blog->id;
        $previousBlog = Blog::where('id', '<', $currentBlogId)->orderBy('id', 'desc')->first();
        $nextBlog = Blog::where('id', '>', $currentBlogId)->orderBy('id', 'desc')->first();
        $recent_post_titles = Blog::orderBy('id', 'desc')->take(20) ->pluck('title');
        $categoriesWithCounts = Category::withCount('blogcategories')->get();
        $tags = Tag::pluck('name');
        $related_post = Blog::with('user','blogcategories.categories')
                            ->orderBy('id', 'desc')
                            ->take(3) 
                            ->get();
        $comments = Blogcomment::where('blog_id', $currentBlogId)
                                ->where('status', 1)
                                ->get();
        return view('website/blog-details', compact('blog', 'recent_post_titles', 'tags', 'previousBlog', 'related_post', 'categoriesWithCounts', 'nextBlog', 'comments', 'readTimeMinutes')); 
    }
    public function blogCategoryWise(Request $request , $categorySlug)
    {
        $category = str_replace('-', ' ', $categorySlug);
        $categoryData = Category::where('name', $category)->firstOrFail();
        $catId = $categoryData->id;       
        $catname = $categoryData->name;     
        $blogs = Blog::with('user', 'blogcategories.categories')
            ->whereHas('blogcategories.categories', function ($query) use ($catId) {
                $query->where('category_id', $catId);
            })
            ->get();
        $tags = Tag::pluck('name');
        $recent_post_titles = Blog::orderBy('id', 'desc')->pluck('title');
        $categoriesWithCounts = Category::withCount('blogcategories')->get();
        return view('website/categorywise_blog',compact('blogs', 'catname', 'categoriesWithCounts', 'tags', 'recent_post_titles')); 
    }
    public function blogTagWise(Request $request , $tagSlug)
    {
        $tag = str_replace('-', ' ', $tagSlug);
        $tagData = Tag::where('name', $tag)->firstOrFail();
        $tagId = $tagData->id;       
        $tagname = $tagData->name;     
        $blogs = Blog::with('user', 'blogtags.tags')
            ->whereHas('blogtags.tags', function ($query) use ($tagId) {
                $query->where('tag_id', $tagId);
            })
            ->get();
        $tags = Tag::pluck('name');
        $recent_post_titles = Blog::orderBy('id', 'desc')->pluck('title');
        $categoriesWithCounts = Category::withCount('blogcategories')->get();
        return view('website/tagwise_blog',compact('blogs', 'tagname', 'categoriesWithCounts', 'tags', 'recent_post_titles')); 
    }
    public function propertyTypes(Request $request , $propertySlug)
    {
        $property_views = PropertyView::all();
        $property_types = PropertyType::all();
        $city_name = City::all();
        $property_type = str_replace('-', ' ', $propertySlug);
        $propertytype = PropertyType::where('name', $property_type)->first();
        $propertytypename = $propertytype->name;
        $property_type_id = $propertytype->id;
        $properties  = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
                                ->where('property_type_id', $property_type_id)
                                ->paginate(10);
        $propertiescount = count($properties);
        $propertytypecounts = PropertyType::withCount('properties')->get();
        $pptypes = PropertyType::all();
        $propertystatuscounts = PropertyStatus::withCount('properties')->get();
        $userFavoritePropertyIds = [];
        $userPropertyEnquiryIds = [];
        $userPropertyseenIds = [];
        if (Auth::check()) {
            $userFavoritePropertyIds = Favorite::where('user_id', Auth::user()->id)->pluck('property_id');
            $userPropertyEnquiryIds = Propertyenquiry::where('user_id', Auth::user()->id)->pluck('property_id');
            $userPropertyseenIds = Propertyseen::where('user_id', Auth::user()->id)->pluck('property_id');
        }
        $categoryIdHan = 1;
            $featured_properties = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
                    ->whereHas('property_categoryids', function ($query) use ($categoryIdHan) {
                        $query->where('property_category_id', $categoryIdHan);
                    })
                    ->where('property_type_id', $property_type_id)
                ->get();
        return view('website/propertytypedetails', compact('properties', 'propertiescount', 'propertytypename', 'propertytypecounts','propertystatuscounts','userPropertyseenIds','userPropertyEnquiryIds','userFavoritePropertyIds','pptypes','propertytype','featured_properties','city_name','property_views','property_types'));
    }
    public function propertyStatus(Request $request , $propertySlug)
    {
        $property_status = str_replace('-', ' ', $propertySlug);
        $propertystatus = PropertyStatus::where('name', $property_status)->first();
        $propertystatusname = $propertystatus->name;
        $property_status_id = $propertystatus->id;
        $properties = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
                    ->where('property_status_id', $property_status_id)
                    ->paginate(10);
        $propertytypecounts = PropertyType::withCount('properties')->get();
        $propertystatuscounts = PropertyStatus::withCount('properties')->get();
        $userFavoritePropertyIds = [];
        $userPropertyEnquiryIds = [];
        $userPropertyseenIds = [];
        if (Auth::check()) {
            $userFavoritePropertyIds = Favorite::where('user_id', Auth::user()->id)->pluck('property_id');
            $userPropertyEnquiryIds = Propertyenquiry::where('user_id', Auth::user()->id)->pluck('property_id');
            $userPropertyseenIds = Propertyseen::where('user_id', Auth::user()->id)->pluck('property_id');
        }

        return view('website/propertystatusdetails', compact('properties', 'propertystatusname', 'propertytypecounts','propertystatuscounts','userPropertyEnquiryIds','userFavoritePropertyIds','userPropertyseenIds'));
    }
    public function CityPropertyDetails(Request $request , $citySlug)
    {
            $city = str_replace('-', ' ', $citySlug);
            $city_name = City::all();
            $property_views = PropertyView::all();
            $property_types = PropertyType::all();
            $property_city = City::where('name', $city)->first();
            $propertycityname = $property_city->name;
            $property_city_id = $property_city->id;
            $properties = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
                        ->where('city_id', $property_city_id)
                        ->paginate(10);
            $propertycount = count($properties);
            $propertytypecounts = PropertyType::withCount('properties')->get();
            $propertystatuscounts = PropertyStatus::withCount('properties')->get();
            $categoryIdHan = 1;
            $featured_properties = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
                    ->whereHas('property_categoryids', function ($query) use ($categoryIdHan) {
                        $query->where('property_category_id', $categoryIdHan);
                    })
                    ->where('city_id', $property_city_id)
                ->get();
            $userFavoritePropertyIds = [];
            $userPropertyEnquiryIds = [];
            $userPropertyseenIds = [];
            if (Auth::check()) {
                $userFavoritePropertyIds = Favorite::where('user_id', Auth::user()->id)->pluck('property_id');
                $userPropertyEnquiryIds = Propertyenquiry::where('user_id', Auth::user()->id)->pluck('property_id');
                $userPropertyseenIds = Propertyseen::where('user_id', Auth::user()->id)->pluck('property_id');
            }
        return view('website/area-city', compact('properties','propertycityname','propertycount','propertytypecounts','propertystatuscounts','featured_properties','userFavoritePropertyIds','userPropertyEnquiryIds','userPropertyseenIds','property_city','city_name','property_views','property_types'));
    }
    public function filterProperties(Request $request)
    {
        $property_city_id = $request->input('city_id');
        $city_name = City::all();
        $property_city = City::where('id', $property_city_id)->first();
        $propertycityname = $property_city->name;
        $properties = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
            ->where('city_id', $property_city_id)
            ->paginate(10);
        $propertycount = $properties->total(); // Use total() for accurate count
        $propertytypecounts = PropertyType::withCount('properties')->get();
        $propertystatuscounts = PropertyStatus::withCount('properties')->get();
        $categoryIdHan = 1;
        $featured_properties = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
            ->whereHas('property_categoryids', function ($query) use ($categoryIdHan) {
                $query->where('property_category_id', $categoryIdHan);
            })
            ->where('city_id', $property_city_id)
            ->get();
        $userFavoritePropertyIds = [];
        $userPropertyEnquiryIds = [];
        $userPropertyseenIds = [];
        if (Auth::check()) {
            $userFavoritePropertyIds = Favorite::where('user_id', Auth::user()->id)->pluck('property_id');
            $userPropertyEnquiryIds = Propertyenquiry::where('user_id', Auth::user()->id)->pluck('property_id');
            $userPropertyseenIds = Propertyseen::where('user_id', Auth::user()->id)->pluck('property_id');
        }
        return view('website.area-city', compact('properties', 'propertycityname', 'propertycount', 'propertytypecounts', 'propertystatuscounts', 'featured_properties', 'userFavoritePropertyIds', 'userPropertyEnquiryIds', 'userPropertyseenIds', 'property_city', 'city_name'));
    }

    
    
    public function TopLocalityCityPropertyDetails(Request $request , $citySlug)
    {
        $city_name = City::all();
        $property_views = PropertyView::all();
        $property_types = PropertyType::all();
        $city = str_replace('-', ' ', $citySlug);
        $property_city = City::where('name', $city)->first();
        $propertycityname = $property_city->name;
        $property_city_id = $property_city->id;
        $properties = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
                    ->Where('top_localities', 1)
                    ->where('city_id', $property_city_id)
                    ->paginate(10);
        $propertycount = count($properties);
        $propertytypecounts = PropertyType::withCount('properties')->get();
        $propertystatuscounts = PropertyStatus::withCount('properties')->get();
        $categoryIdHan = 1;
        $featured_properties = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
                ->whereHas('property_categoryids', function ($query) use ($categoryIdHan) {
                    $query->where('property_category_id', $categoryIdHan);
                })
                ->where('city_id', $property_city_id)
            ->get();  
            $userFavoritePropertyIds = [];
            $userPropertyEnquiryIds = [];
            $userPropertyseenIds = [];
            if (Auth::check()) {
                $userFavoritePropertyIds = Favorite::where('user_id', Auth::user()->id)->pluck('property_id');
                $userPropertyEnquiryIds = Propertyenquiry::where('user_id', Auth::user()->id)->pluck('property_id');
                $userPropertyseenIds = Propertyseen::where('user_id', Auth::user()->id)->pluck('property_id');
            }
        return view('website/area-city', compact('city_name','property_views','property_city','properties','propertycityname','propertycount','propertytypecounts','propertystatuscounts','featured_properties', 'userFavoritePropertyIds', 'userPropertyEnquiryIds', 'userPropertyseenIds','property_types'));
    }
    public function EmergingLocalityCityPropertyDetails(Request $request , $citySlug)
    {
        $city_name = City::all();
        $property_views = PropertyView::all();
        $property_types = PropertyType::all();
        $city = str_replace('-', ' ', $citySlug);
        $property_city = City::where('name', $city)->first();
        $propertycityname = $property_city->name;
        $property_city_id = $property_city->id;
        $properties = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
                        ->Where('emerging_localities', 1)
                        ->where('city_id', $property_city_id)
                        ->paginate(10);
        $propertycount = count($properties);
        $propertytypecounts = PropertyType::withCount('properties')->get();
        $propertystatuscounts = PropertyStatus::withCount('properties')->get();
        $categoryIdHan = 1;
        $featured_properties = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
                ->whereHas('property_categoryids', function ($query) use ($categoryIdHan) {
                    $query->where('property_category_id', $categoryIdHan);
                })
                ->where('city_id', $property_city_id)
            ->get();  
        $userFavoritePropertyIds = [];
        $userPropertyEnquiryIds = [];
        $userPropertyseenIds = [];
            if (Auth::check()) {
                $userFavoritePropertyIds = Favorite::where('user_id', Auth::user()->id)->pluck('property_id');
                $userPropertyEnquiryIds = Propertyenquiry::where('user_id', Auth::user()->id)->pluck('property_id');
                $userPropertyseenIds = Propertyseen::where('user_id', Auth::user()->id)->pluck('property_id');
            }
        return view('website/area-city', compact('city_name','property_views','properties','propertycityname','propertycount','propertytypecounts','propertystatuscounts','featured_properties','userFavoritePropertyIds','userPropertyEnquiryIds','userPropertyseenIds','property_city','property_types'));
    }
    public function Recomandedproperty()
    {
        $property = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')->get();
        $categoryIdHan = 1;
        $featured_properties = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
                ->whereHas('property_categoryids', function ($query) use ($categoryIdHan) {
                    $query->where('property_category_id', $categoryIdHan);
                })
            ->get();  
        $blog = Blog::with('blogcategories.categories')->get();
            $userFavoritePropertyIds = [];
            $userPropertyEnquiryIds = [];
            $userPropertyseenIds = [];
            if (Auth::check()) {
                $userFavoritePropertyIds = Favorite::where('user_id', Auth::user()->id)->pluck('property_id');
                $userPropertyEnquiryIds = Propertyenquiry::where('user_id', Auth::user()->id)->pluck('property_id');
                $userPropertyseenIds = Propertyseen::where('user_id', Auth::user()->id)->pluck('property_id');
            }
        return view('website/recomanded_property', compact('featured_properties', 'property', 'blog', 'userFavoritePropertyIds', 'userPropertyEnquiryIds', 'userPropertyseenIds'));
    }
    public function benefitsOfInvestingInALandGenuinePlot() 
    {
        $benefit = Benefit::all();
        $blog = Blog::with('blogcategories.categories')->get();
        return view('website/benefits-of-investing-in-a-land-genuine-plot', compact('blog', 'benefit')); 
    }
    public function ChecklistBeforeBuyingLand() 
    {
        $blog = Blog::with('blogcategories.categories')->get();
        $checklist = Checklist::all();
        return view('website/checklist-before-buying-land', compact('blog','checklist')); 
    }
    public function Shortlist() 
    {
        if (Auth::check()) {https://github.com/ajaxorg/ace/wiki/Default-Keyboard-Shortcuts
            $property = Favorite::where('user_id', Auth::user()->id)
                    ->with('property.country', 'property.state', 'property.city', 'property.propertyType', 'property.propertyView', 'property.propertyStatus', 'property.images', 'property.propertyCategoryids.property_categories')
                    ->get();;
        } else {
            $property = collect();
        }
        return view('website/shortlist', compact('property')); 
    }
    public function ContactedProperty() 
    {
        if (Auth::check()) {
            $property = Propertyenquiry::where('user_id', Auth::user()->id)
                    ->with('property.country', 'property.state', 'property.city', 'property.propertyType', 'property.propertyView', 'property.propertyStatus', 'property.images', 'property.propertyCategoryids.property_categories')
                    ->get();
        } else {
            $property = collect();
        }
        return view('website/property_enquiry', compact('property')); 
    }
    public function ViewedProperty() 
    {
        if (Auth::check()) {
            $property = Propertyseen::where('user_id', Auth::user()->id)
                    ->with('property.country', 'property.state', 'property.city', 'property.propertyType', 'property.propertyView', 'property.propertyStatus', 'property.images', 'property.propertyCategoryids.property_categories')
                    ->get();
        } else {
            $property = collect();
        }
        return view('website/property_seen', compact('property')); 
    }
    public function SimilarProperty() 
    {
        if (Auth::check()) {
            
            $recentlyViewedPropertyIds = Propertyseen::where('user_id', Auth::user()->id)
                                    ->orderBy('created_at', 'desc')
                                    ->limit(10)
                                    ->pluck('property_id');
            $recentlyLikedPropertyIds = Favorite::where('user_id', Auth::user()->id)
                                    ->orderBy('created_at', 'desc')
                                    ->limit(10)
                                    ->pluck('property_id');
            $similarPropertyIds = $recentlyViewedPropertyIds->merge($recentlyLikedPropertyIds)->unique();
            // print_r($similarPropertyIds);exit;
            // $property = Property::whereIn('id', $similarPropertyIds)
            //             ->with('country', 'state', 'city', 'propertyType', 'propertyView', 'propertyStatus', 'images', 'propertyCategoryids.property_categories')
            //             ->get();
            $property = Property::whereIn('id', $similarPropertyIds)
                            ->with('property.country', 'property.state', 'property.city', 'property.propertyType', 'property.propertyView', 'property.propertyStatus', 'property.images', 'property.propertyCategoryids.property_categories')
                            ->get();
            print_r($property);exit;
        } else {
            $property = collect();
        }
        return view('website/property_similar', compact('property')); 
    }
    
    public function BelowPlots(Request $request, $price,$unit)
    {
        $categoryIdHan = 1;
        $belowprice = $price . ' ' . $unit;
        $propertytypecounts = PropertyType::withCount('properties')->get();
        $propertystatuscounts = PropertyStatus::withCount('properties')->get();
        $property = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
                            ->whereRaw("CONVERT(SUBSTRING_INDEX(price, ' ', 1), SIGNED) < ?", [$price])  // Extract numeric value and compare
                            ->whereRaw("SUBSTRING_INDEX(price, ' ', -1) = ?", [$unit])  // Compare units
                            ->get();
        $propertycount = count($property);
        
        $city_name = City::all();
        $property_views = PropertyView::all();
        $property_types = PropertyType::all();
        $featured_properties = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
                    ->whereHas('property_categoryids', function ($query) use ($categoryIdHan) {
                        $query->where('property_category_id', $categoryIdHan);
                    })
                    // ->where('city_id', $property_city_id)
                ->get();
        return view('website/below_property_searchresult', compact('property', 'propertycount', 'propertytypecounts', 'propertystatuscounts','belowprice','city_name','property_views','featured_properties','property_types'));
    }
    public function LaunchProject(Request $request)
    {
        $properties = Newlaunchprojects::with('property.country', 'property.state', 'property.city', 'property.property_type', 'property.property_view', 'property.property_statuses', 'property.images')
                                ->paginate(10);
        $city_name = City::all();
        $property_views = PropertyView::all();
        $property_types = PropertyType::all();
        $propertycount = count($properties);
        // print_r($propertycount);exit;
        $propertytypecounts = PropertyType::withCount('properties')->get();
        $propertystatuscounts = PropertyStatus::withCount('properties')->get();
        $categoryIdHan = 1;
        $featured_properties = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
                ->whereHas('property_categoryids', function ($query) use ($categoryIdHan) {
                    $query->where('property_category_id', $categoryIdHan);
                })
                // ->where('city_id', $property_city_id)
            ->get();
        $userFavoritePropertyIds = [];
        $userPropertyEnquiryIds = [];
        $userPropertyseenIds = [];
        if (Auth::check()) {
            $userFavoritePropertyIds = Favorite::where('user_id', Auth::user()->id)->pluck('property_id');
            $userPropertyEnquiryIds = Propertyenquiry::where('user_id', Auth::user()->id)->pluck('property_id');
            $userPropertyseenIds = Propertyseen::where('user_id', Auth::user()->id)->pluck('property_id');
        }
        $pagename = "New Launch Project";
        return view('website/new_launch_projects', compact('pagename','properties','propertycount','propertytypecounts','propertystatuscounts','featured_properties','userFavoritePropertyIds','userPropertyEnquiryIds','userPropertyseenIds','property_views','city_name','property_types'));
    }
    public function ReadyPossessionProject(Request $request)
    {
        $properties = Readypossessionproject::with('property.country', 'property.state', 'property.city', 'property.property_type', 'property.property_view', 'property.property_statuses', 'property.images')
                                ->paginate(10);
        $city_name = City::all();
        $property_views = PropertyView::all();
        $property_types = PropertyType::all();
        $propertycount = count($properties);
        $propertytypecounts = PropertyType::withCount('properties')->get();
        $propertystatuscounts = PropertyStatus::withCount('properties')->get();
        $categoryIdHan = 1;
        $featured_properties = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
                ->whereHas('property_categoryids', function ($query) use ($categoryIdHan) {
                    $query->where('property_category_id', $categoryIdHan);
                })
                // ->where('city_id', $property_city_id)
            ->get();
        $userFavoritePropertyIds = [];
        $userPropertyEnquiryIds = [];
        $userPropertyseenIds = [];
        if (Auth::check()) {
            $userFavoritePropertyIds = Favorite::where('user_id', Auth::user()->id)->pluck('property_id');
            $userPropertyEnquiryIds = Propertyenquiry::where('user_id', Auth::user()->id)->pluck('property_id');
            $userPropertyseenIds = Propertyseen::where('user_id', Auth::user()->id)->pluck('property_id');
        }
        $pagename = "Ready Possession Project";
        return view('website/new_launch_projects', compact('pagename','properties','propertycount','propertytypecounts','propertystatuscounts','featured_properties','userFavoritePropertyIds','userPropertyEnquiryIds','userPropertyseenIds','property_views','city_name','property_types'));
    }
    public function PlotsCollection(Request $request, $name)
    {
        $view_id = PropertyView::where('name', $name)->value('id');
        $propertytypecounts = PropertyType::withCount('properties')->get();
        $propertystatuscounts = PropertyStatus::withCount('properties')->get();
        $property = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
                            ->where('property_view_id', $view_id)
                            ->get();
        $propertycount = count($property);
        $city_name = City::all();
        $property_views = PropertyView::all();
        $property_types = PropertyType::all();
        $categoryIdHan = 1;
        $featured_properties = Property::with('country', 'state', 'city', 'property_type', 'property_view', 'property_statuses', 'images', 'property_categoryids.property_categories')
                ->whereHas('property_categoryids', function ($query) use ($categoryIdHan) {
                    $query->where('property_category_id', $categoryIdHan);
                })
                // ->where('city_id', $property_city_id)
            ->get();
        return view('website/plots_collection_property_searchresult', compact('property', 'propertycount', 'propertytypecounts', 'propertystatuscounts', 'name','city_name','property_views','property_types','featured_properties'));
    }
    public function BlogCommentSave(Request $request)
    {
        $blogcomment = new Blogcomment;
        $blogcomment->blog_id = $request->input('blog_id');
        $blogcomment->name = $request->input('comment_name');
        $blogcomment->mobilenumber = $request->input('comment_number');
        $blogcomment->email = $request->input('comment_email');   
        $blogcomment->comment = $request->input('comment_message'); 
        $blogcomment->status = 2; 
        $blogcomment->save();
        return redirect()->back()->with('success', 'Blog Comment successfully.');
    }
    public function BlogLoginCommentSave(Request $request)
    {
        $blogcomment = new Blogcomment;
        $blogcomment->userid = Auth::user()->id;
        $blogcomment->blog_id = $request->input('blog_id');
        $blogcomment->comment = $request->input('comment_message'); 
        $blogcomment->status = 1; 
        $blogcomment->save();
        return redirect()->back()->with('success', 'Blog Comment successfully.');
    }
    public function SubscribedataSave(Request $request)
    {
        $url = isset($_POST['url']) ? $_POST['url'] : '';
        
        $subscribe = new Subscribe;
        $name = $subscribe->name = $request->input('sub_n');
        $phone = $subscribe->mobilenumber = $request->input('sub_m');
        $email = $subscribe->email = $request->input('sub_e');
        $city = $subscribe->city = $request->input('sub_c'); 
        $comment = $subscribe->comment = $request->input('sub_c'); 
        $subscribe->source = "Website";   
        $subscribe->url = $url;   
        $subscribe->save();
        
        
        $client = 'Genuine Plots';
        $cid = "7bc8c8e5-ab82-48c1-a1b0-352396d7691c";
        $product = "Genuine Plots Website";
        //////////////////////////
        $source = "Website";
        $subsource = "Subscribe Pop up";
        $media = "Form";
        //////////////////FORM DATA///////////////////////////////////////////////////////////
        $name = $name;
        $email = $email;
        $phone = $phone;
        $comment = "City Name:- " . $city . "\n" . "Comment:-" . ' ' . $comment;
        
        $date = date("Y-m-d");
        ////////////AUX INPUTS///////////////////////////////////////////////////////////////
        $aux_1 = '';
        $aux_2 = '';
        $aux_3 = '';
        $aux_4 = '';
        $aux_5 = '';
        $aux_6 = '';
        $aux_7 = '';
        $aux_8 = '';
        $aux_9 = '';
        // UTM INCLUDES///////////////////
        $country_code = "";
        $utm_source = isset($_POST['utm_source']) ? $_POST['utm_source'] : '';
        $utm_medium = isset($_POST['utm_medium']) ? $_POST['utm_medium'] : '';
        $utm_campaign = isset($_POST['utm_campaign']) ? $_POST['utm_campaign'] : '';
        $utm_placement = isset($_POST['utm_placement']) ? $_POST['utm_placement'] : '';
        $utm_term = isset($_POST['utm_term']) ? $_POST['utm_term'] : '';
        $utm_content = isset($_POST['utm_content']) ? $_POST['utm_content'] : '';
        $ip = isset($_POST['ip']) ? $_POST['ip'] : '';
        $browser = isset($_POST['browser']) ? $_POST['browser'] : '';
        $os = isset($_POST['os']) ? $_POST['os'] : '';
        $gclid = isset($_POST['gclid']) ? $_POST['gclid'] : '';
        $device = isset($_POST['device']) ? $_POST['device'] : '';
        $url = isset($_POST['url']) ? $_POST['url'] : '';
        // $url = $request->url();
    $formdata = array(
            'cid' => $cid,
            'client'=>$client,
            'product' => $product,
            'source' => $source,
            'subsource' => $subsource,
            'country_code' => $country_code,
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'comment' => $comment,
            'media' => $media,
            'utm_source' => $utm_source,
            'utm_medium' => $utm_medium,
            'utm_campaign' => $utm_campaign,
            'utm_placement' => $utm_placement,
            'utm_term' => $utm_term,
            'utm_content' => $utm_content,
            'url' => $url,
            'gclid' => $gclid,
            'ip' => $ip,
            'os' => $os,
            'device' => $device,
            'browser' => $browser,
            'aux_1' => $aux_1,
            'aux_2' => $aux_2,
            'aux_3' => $aux_3,
            'aux_4' => $aux_4,
            'aux_5' => $aux_5,
            'aux_6' => $aux_6,
            'aux_7' => $aux_7,
            'aux_8' => $aux_8,
            'aux_9' => $aux_9,
            
            );
    
    // PUSH
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://router.volarlabs.com/api/addLead',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $formdata,
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    // CSV SAVE
    array_push($formdata,$date);
    $handle = fopen("leads.csv", "a");
    fputcsv($handle, $formdata); # $line is an array of strings (array|string[])
    fclose($handle);
    http_response_code(200);
    return redirect()->back()->with('success', 'Form Submitted successfully.');
    }
    public function EnquirepopdataSave(Request $request)
    {
        $url = isset($_POST['url']) ? $_POST['url'] : '';
        $enquiry = new Enquiry;
        $name = $enquiry->name = $request->input('enq_n');
        $phone = $enquiry->mobilenumber = $request->input('enq_m');
        $email = $enquiry->email = $request->input('enq_e');
        $city = $enquiry->city = $request->input('enq_c');  
        $size = $enquiry->size = $request->input('enq_s');  
        $area = $enquiry->area = $request->input('enq_a');  
        $budget = $enquiry->budget = $request->input('enq_b');  
        $comment = $enquiry->comment = $request->input('enq_c');  
        $enquiry->source = "Website";    
        $enquiry->url = $url;        
        $enquiry->save();
        
        $client = 'Genuine Plots';
        $cid = "7bc8c8e5-ab82-48c1-a1b0-352396d7691c";
        $product = "Genuine Plots Website";
        //////////////////////////
        $source = "Website";
        $subsource = "Enquiry Pop up";
        $media = "Form";
        //////////////////FORM DATA///////////////////////////////////////////////////////////
        $comment = "City Name:- " . $city . "\n" ."Size:- " . $size . "\n" ."Area:- " . $area . "\n" ."Budget:- " . $budget . "\n" . "Comment:-" . ' ' . $comment;
        
        $date = date("Y-m-d");
        ////////////AUX INPUTS///////////////////////////////////////////////////////////////
        $aux_1 = '';
        $aux_2 = '';
        $aux_3 = '';
        $aux_4 = '';
        $aux_5 = '';
        $aux_6 = '';
        $aux_7 = '';
        $aux_8 = '';
        $aux_9 = '';
        // UTM INCLUDES///////////////////
        $country_code = "";
        $utm_source = isset($_POST['utm_source']) ? $_POST['utm_source'] : '';
        $utm_medium = isset($_POST['utm_medium']) ? $_POST['utm_medium'] : '';
        $utm_campaign = isset($_POST['utm_campaign']) ? $_POST['utm_campaign'] : '';
        $utm_placement = isset($_POST['utm_placement']) ? $_POST['utm_placement'] : '';
        $utm_term = isset($_POST['utm_term']) ? $_POST['utm_term'] : '';
        $utm_content = isset($_POST['utm_content']) ? $_POST['utm_content'] : '';
        $ip = isset($_POST['ip']) ? $_POST['ip'] : '';
        $browser = isset($_POST['browser']) ? $_POST['browser'] : '';
        $os = isset($_POST['os']) ? $_POST['os'] : '';
        $gclid = isset($_POST['gclid']) ? $_POST['gclid'] : '';
        $device = isset($_POST['device']) ? $_POST['device'] : '';
        $url = isset($_POST['url']) ? $_POST['url'] : '';
        // $url = $request->url();
    $formdata = array(
            'cid' => $cid,
            'client'=>$client,
            'product' => $product,
            'source' => $source,
            'subsource' => $subsource,
            'country_code' => $country_code,
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'comment' => $comment,
            'media' => $media,
            'utm_source' => $utm_source,
            'utm_medium' => $utm_medium,
            'utm_campaign' => $utm_campaign,
            'utm_placement' => $utm_placement,
            'utm_term' => $utm_term,
            'utm_content' => $utm_content,
            'url' => $url,
            'gclid' => $gclid,
            'ip' => $ip,
            'os' => $os,
            'device' => $device,
            'browser' => $browser,
            'aux_1' => $aux_1,
            'aux_2' => $aux_2,
            'aux_3' => $aux_3,
            'aux_4' => $aux_4,
            'aux_5' => $aux_5,
            'aux_6' => $aux_6,
            'aux_7' => $aux_7,
            'aux_8' => $aux_8,
            'aux_9' => $aux_9,
            
            );
    
    // PUSH
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://router.volarlabs.com/api/addLead',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $formdata,
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    // CSV SAVE
    array_push($formdata,$date);
    $handle = fopen("leads.csv", "a");
    fputcsv($handle, $formdata); # $line is an array of strings (array|string[])
    fclose($handle);
    http_response_code(200);
    return redirect()->back()->with('success', 'Form Submitted successfully.');
    }
    public function AddPropertyNewEnquiry(Request $request)
    {
        $property = new Propertyenquiry();
        $pid = $property->property_id = $request->input('property_id');
        $name = $property->name = $request->input('nan');
        $phone = $property->mobilenumber = $request->input('num');
        $email = $property->email = $request->input('eoe');
        $comment = $property->comment = $request->input('coc');
        $property->notification = "1";
        $property->source = "Website";
        $property->created_at = Carbon::now();
        $property->save();
        $property = Property::find($pid);       
        $property_name = $property->title;    
        // return redirect()->back()->with('success', 'Property Enquired Successfully.');
        
        $client = 'Genuine Plots';
        $cid = "7bc8c8e5-ab82-48c1-a1b0-352396d7691c";
        $product = "Genuine Plots Website";
        //////////////////////////
        $source = "Website";
        $subsource = $property_name;
        $media = "Form";
        //////////////////FORM DATA///////////////////////////////////////////////////////////
        // $name = $name;
        // $email = $email;
        // $phone = $phone;
        // $comment = $comment;
        
        $date = date("Y-m-d");
        ////////////AUX INPUTS///////////////////////////////////////////////////////////////
        $aux_1 = '';
        $aux_2 = '';
        $aux_3 = '';
        $aux_4 = '';
        $aux_5 = '';
        $aux_6 = '';
        $aux_7 = '';
        $aux_8 = '';
        $aux_9 = '';
        // UTM INCLUDES///////////////////
        $country_code = "";
        $utm_source = isset($_POST['utm_source']) ? $_POST['utm_source'] : '';
        $utm_medium = isset($_POST['utm_medium']) ? $_POST['utm_medium'] : '';
        $utm_campaign = isset($_POST['utm_campaign']) ? $_POST['utm_campaign'] : '';
        $utm_placement = isset($_POST['utm_placement']) ? $_POST['utm_placement'] : '';
        $utm_term = isset($_POST['utm_term']) ? $_POST['utm_term'] : '';
        $utm_content = isset($_POST['utm_content']) ? $_POST['utm_content'] : '';
        $ip = isset($_POST['ip']) ? $_POST['ip'] : '';
        $browser = isset($_POST['browser']) ? $_POST['browser'] : '';
        $os = isset($_POST['os']) ? $_POST['os'] : '';
        $gclid = isset($_POST['gclid']) ? $_POST['gclid'] : '';
        $device = isset($_POST['device']) ? $_POST['device'] : '';
        $url = isset($_POST['url']) ? $_POST['url'] : '';
        // $url = $request->url();
        $formdata = array(
                'cid' => $cid,
                'client'=>$client,
                'product' => $product,
                'source' => $source,
                'subsource' => $subsource,
                'country_code' => $country_code,
                'name' => $name,
                'phone' => $phone,
                'email' => $email,
                'comment' => $comment,
                'media' => $media,
                'utm_source' => $utm_source,
                'utm_medium' => $utm_medium,
                'utm_campaign' => $utm_campaign,
                'utm_placement' => $utm_placement,
                'utm_term' => $utm_term,
                'utm_content' => $utm_content,
                'url' => $url,
                'gclid' => $gclid,
                'ip' => $ip,
                'os' => $os,
                'device' => $device,
                'browser' => $browser,
                'aux_1' => $aux_1,
                'aux_2' => $aux_2,
                'aux_3' => $aux_3,
                'aux_4' => $aux_4,
                'aux_5' => $aux_5,
                'aux_6' => $aux_6,
                'aux_7' => $aux_7,
                'aux_8' => $aux_8,
                'aux_9' => $aux_9,
                
                );
        
        // PUSH
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://router.volarlabs.com/api/addLead',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => $formdata,
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        // CSV SAVE
        array_push($formdata,$date);
        $handle = fopen("leads.csv", "a");
        fputcsv($handle, $formdata); # $line is an array of strings (array|string[])
        fclose($handle);
        http_response_code(200);
        return redirect()->back()->with('success', 'Form Submitted successfully.');
    }
}
