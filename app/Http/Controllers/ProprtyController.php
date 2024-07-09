<?php

namespace App\Http\Controllers;
use auth;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\District;
use App\Models\Area;
use App\Models\PropertyType;
use App\Models\PropertyStatus;
use App\Models\PropertyCategory;
use App\Models\PropertyCategoryid;
use App\Models\PropertyView;
use App\Models\Property;
use App\Models\Image;
use App\Models\Seo;
use App\Models\Aminity;
use App\Models\Aminityid;
use App\Models\Propertyenquiry;
use App\Models\Layoutimage;
use App\Models\Actualimage;
use App\Models\Investmentbenifit;
use App\Models\Locationconnectivity;
use App\Models\Enquiryhistory;
use App\Models\Youtube;
use App\Models\Enquiry;
use App\Models\Websiteenquiryhistory;
use App\Models\PropertynewEnquiry;
use App\Models\PropertynewEnquiryhistory;
use App\Models\Propertyfeature;
use Illuminate\Support\Str;
use App\Models\Exclusive_project;
use Carbon\Carbon; // Add this line
use Illuminate\Http\Request;

class ProprtyController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkSession');
    }
    public function property_viewindex(Request $request)
    {
        $exclusive_project = Exclusive_project::with('property')
                                ->get();
        $allproperty = Property::all();
        $property = Property::with('property_categoryids.property_categories')->get();
        return view('property/propertyview_index', compact('allproperty','exclusive_project','property'));
    }
    public function index()
    {
        if(Auth::user()->role == "seller"){
                        $property = Property::where('user_id', Auth::user()->id)
                            ->with('property_categoryids.property_categories')->get();
        }else{
                $property = Property::with('property_categoryids.property_categories')->get();
        }
        return view('property/index', compact('property'));
    }
    public function AddProprtyy()
    {
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $districts = District::all();
        $landtype = PropertyType::all();
        $propertystatus = PropertyStatus::all();
        $propertyview = PropertyView::all();
        $propertycategory = PropertyCategory::all();
        $aminities = Aminity::all();
        return view('property/property_add', compact('countries', 'states', 'cities', 'districts','landtype', 'propertystatus', 'propertyview', 'propertycategory', 'aminities'));
    }
    // Property::create($request->all());
    public function SaveProprty(Request $request)
    {
        $request->validate([
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Max file size is 2MB
        ]);
        $date = date('Y-m-d');
        $property = new Property();
        $property->user_id = Auth::user()->id;
        $propertytitle = $property->title = $request->input('title');
        $property->slug = Str::slug($propertytitle);
        $area = $request->input('area');
        $areaUnit = $request->input('area_unit');
        $propertyarea = $property->area = $area . ' ' . $areaUnit;
        $property->price = $request->input('price');
        $property->loan = $request->input('loan');
        $onwardPrice = $request->input('onward_price');
        $priceUnit = $request->input('price_unit');
        $propertyprice = $property->price = $onwardPrice . ' ' . $priceUnit;
        if($priceUnit == "Thousand") {
            $ActualPrice = $onwardPrice * 1000;
        } elseif($priceUnit == "Lakh") {
            $ActualPrice = $onwardPrice * 100000;
        } elseif($priceUnit == "Cr") {
            $ActualPrice = $onwardPrice * 10000000;
        } else {
            $ActualPrice = "";
        }
        $property->actual_price = $ActualPrice;
        $openspace = $request->input('openspace');
        $openspaceUnit = $request->input('openspace_unit');
        $property->openspace = $openspace . ' ' . $openspaceUnit;
        $plot_size_from = $request->input('plot_size_from');
        $plot_size_fromUnit = $request->input('plot_size_from_unit');
        $plot_size_fromu = $property->plot_size_from = $plot_size_from . ' ' . $plot_size_fromUnit;        
        $plot_size_to = $request->input('plot_size_to');
        $plot_size_toUnit = $request->input('plot_size_to_unit');
        $property->plot_size_to = $plot_size_to . ' ' . $plot_size_toUnit; 
        
        if ($plot_size_fromUnit == "Sqft") {
            $plotareafrom = $plot_size_from;
        } elseif ($plot_size_fromUnit == "Sqm") {
            $plotareafrom = $plot_size_from * 10.764;
        } elseif ($plot_size_fromUnit == "Acre") {
            $plotareafrom = $plot_size_from * 43560;
        } else {
            $plotareafrom = "";
        }
        $property->plotareafrom = $plotareafrom;
        if ($plot_size_toUnit == "Sqft") {
            $plotareato = $plot_size_to;
        } elseif ($plot_size_toUnit == "Sqm") {
            $plotareato = $plot_size_to * 10.764;
        } elseif ($plot_size_toUnit == "Acre") {
            $plotareato = $plot_size_to * 43560;
        } else {
            $plotareato = "";
        }
        $property->plotareato = $plotareato;
        
        $property->offer = $request->input('offer');
        $property->country_id = $request->input('country_id');
        $property->state_id = $request->input('state_id');  
        $property->dist_id = $request->input('dist_id');  
        $city_id = $property->city_id = $request->input('city_id');
        $area_id = $property->area_id = $request->input('area_id');
        $property->landmark = $request->input('landmark');
        $property->status = 1;
        $property->description = $request->input('description');
        $property->address = $request->input('address');
        $short_address = $property->short_address = $request->input('short_address');
        $property->property_type_id = $request->input('property_type_id');
        $property->property_status_id = $request->input('property_status_id');
        $property->property_view_id = $request->input('property_view_id');   
        $property->possession = $request->input('possession');
        $property->lat = $request->input('latitude');    
        $property->lng = $request->input('longitude');          
        $property->brochure = $request->input('brochure');  
        $property->investment_benifittitle = $request->input('investment_benifittitle');  
        $property->investment_benifitdescription = $request->input('investment_benifitdescription');  
        $property->investment_benifitimage = $request->input('investment_benifitimage');  
        if (request()->hasFile('investment_benifitimage')){
            $investment_benifitimage = $request->file('investment_benifitimage');
            $filename = $investment_benifitimage->getClientOriginalName();
            $destinationPath = './images/investment_benifit';
            $investment_benifitimage->move($destinationPath , $filename);
            $property->investment_benifitimage = $filename;
        }
        if ($request->hasFile('brochure')) {
            $brochureFile = $request->file('brochure');
            $brochureFileName = $brochureFile->getClientOriginalName();
            $destinationPath = './brochures';
            $brochureFile->move($destinationPath, $brochureFileName);
            $property->brochure = $brochureFileName;
        }
        $property->save();        
        $lastInsertedId = $property->id;
        $city = City::find($city_id);
        if ($city) {
            $citynm = $city->name;
            $cityName = "Plot for sale in $citynm";
        }else{
            $cityName = "";
        }
        $area = Area::find($area_id);
        if ($area) {
            $areanm = $area->name;
            $areaName = "Plot for sale in $areanm ,";
        }else{
            $areaName = "";
        }
        if($propertytitle != ""){
            $projectname = "$propertytitle Plots for sale $short_address ," ;
        }else{
            $projectname = "" ;
        }
        if($plot_size_fromu != ""){
            $plotsizefrom = "Plot Sizes from $plot_size_fromu ," ;
        }else{
            $plotsizefrom = "" ;
        }
        if($propertyarea != ""){
            $property_area = "for sale in $propertyarea," ;
        }else{
            $property_area = "" ;
        }
        if($propertyprice != ""){
            $property_price = "Plots for sale at $propertyprice in $propertyarea," ;
        }else{
            $property_price = "" ;
        }
        $metatitle = "$projectname $cityName $areaName $plotsizefrom $property_area $property_price ";
        // seo 
        $propertyId = $lastInsertedId;
        $seo = Seo::firstOrNew(['property_id' => $propertyId]); 
        $seo->metatitle = $metatitle;
        $seo->save();
        $propertyfeatures = $request->input('propertyfeature', []);
        foreach ($propertyfeatures as $propertyfeature) {
            $Propertyfeature = new Propertyfeature();
            $Propertyfeature->property_id = $lastInsertedId;
            $Propertyfeature->feature = $propertyfeature;
            $Propertyfeature->save();
        }
        $features = $request->input('feature', []);
        foreach ($features as $feature) {
            $propertyFeature = new Investmentbenifit();
            $propertyFeature->property_id = $lastInsertedId;
            $propertyFeature->name = $feature;
            $propertyFeature->save();
        }
        $youtubes = $request->input('youtube', []);
        foreach ($youtubes as $youtube) {
            $propertyYoutube = new Youtube();
            $propertyYoutube->property_id = $lastInsertedId;
            $propertyYoutube->name = $youtube;
            $propertyYoutube->save();
        }
        $propertyfeatures = $request->input('propertyfeature', []);
        foreach ($propertyfeatures as $propertyfeature) {
            $propertyYoutube = new Youtube();
            $propertyYoutube->property_id = $lastInsertedId;
            $propertyYoutube->name = $youtube;
            $propertyYoutube->save();
        }
        $locationconnectivities = $request->input('locationconnectivity', []);
        foreach ($locationconnectivities as $locationconnectivity) {
            $propertyLocationconnectivity = new Locationconnectivity();
            $propertyLocationconnectivity->property_id = $lastInsertedId;
            $propertyLocationconnectivity->name = $locationconnectivity;
            $propertyLocationconnectivity->save();
        }
        if ($request->hasFile('images')) {
            $uploadedImages = [];
            foreach ($request->file('images') as $imageFile) {
                $imageName = $imageFile->getClientOriginalName();
                $destinationPath = './images/property_images';
                $imageFile->move($destinationPath, $imageName);
                $uploadedImages[] = $imageName;
            }
            foreach ($uploadedImages as $uploadedImage) {
                $image = new Image();
                $image->property_id = $lastInsertedId;
                $image->name = $uploadedImage;
                $image->save();
            }
        }
        if ($request->hasFile('actualimages')) {
            $uploadedActualImages = [];
            foreach ($request->file('actualimages') as $imageFile) {
                $imageName = $imageFile->getClientOriginalName();
                $destinationPath = './images/actualimages';
                $imageFile->move($destinationPath , $imageName);
                $uploadedActualImages[] = $imageName;
            }
            foreach ($uploadedActualImages as $uploadedImage) {
                $image = new Actualimage();
                $image->property_id = $lastInsertedId;
                $image->name = $uploadedImage;
                $image->save();
            }
        }
        if ($request->hasFile('layoutimages')) {
            $uploadedImages = [];
            foreach ($request->file('layoutimages') as $imageFile) {
                $imageName = $imageFile->getClientOriginalName();
                $destinationPath = './images/layoutimages';
                $imageFile->move($destinationPath , $imageName);
                $uploadedImages[] = $imageName;
            }
            foreach ($uploadedImages as $uploadedImage) {
                $image = new Layoutimage();
                $image->property_id = $lastInsertedId;
                $image->name = $uploadedImage;
                $image->save();
            }
        }
        $selectedCategoryIds = $request->input('propertycategory_id', []);
        foreach ($selectedCategoryIds as $selectedCategoryId) {
            $propertyCategoryid = new PropertyCategoryid;
            $propertyCategoryid->property_id = $lastInsertedId;
            $propertyCategoryid->property_category_id = $selectedCategoryId; 
            $propertyCategoryid->save();
        }
        $selectedAminityIds = $request->input('aminities', []);             
        foreach ($selectedAminityIds as $selectedAminityId) {
            $aminityid = new Aminityid;
            $aminityid->property_id = $lastInsertedId;
            $aminityid->aminity_id = $selectedAminityId; 
            $aminityid->save();
        }
        return redirect('properties')->with('success', 'Property Created Successfully.');
    }
    public function PropertEdit(Request $request, $id)
    {
        $property = Property::with('property_categoryids.property_categories')
                    ->findOrFail($id);
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $districts = District::all();
        $areas = Area::all();
        $landtype = PropertyType::all();
        $propertystatus = PropertyStatus::all();
        $propertyview = PropertyView::all();
        $propertycategory = PropertyCategory::all();
        $aminities = Aminity::all();
        return view('property/property_edit', compact('property', 'countries', 'states', 'cities', 'districts', 'areas' , 'landtype', 'propertystatus', 'propertyview', 'propertycategory', 'aminities'));
    }
    public function PropertViewEdit(Request $request, $id)
    {
        $property = Property::with('property_categoryids.property_categories')
                    ->findOrFail($id);
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $districts = District::all();
        $areas = Area::all();
        $landtype = PropertyType::all();
        $propertystatus = PropertyStatus::all();
        $propertyview = PropertyView::all();
        $propertycategory = PropertyCategory::all();
        $aminities = Aminity::all();
        return view('property/property_viewedit', compact('property', 'countries', 'states', 'cities', 'districts', 'areas' , 'landtype', 'propertystatus', 'propertyview', 'propertycategory', 'aminities'));
    }
    public function PropertUpdate(Request $request, $id)
    {
        
        $request->validate([
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Max file size is 2MB
        ]);
        $date = date('Y-m-d');
        $property = Property::findOrFail($id);
        $property->user_id = Auth::user()->id;
        $property->title = $request->input('title');
        // $property->area = $request->input('area');
        // $property->price = $request->input('price');
        $onwardPrice = $request->input('onward_price');
        $priceUnit = $request->input('price_unit');
        $property->price = $onwardPrice . ' ' . $priceUnit;
        if($priceUnit == "Thousand") {
            $ActualPrice = $onwardPrice * 1000;
        } elseif($priceUnit == "Lakh") {
            $ActualPrice = $onwardPrice * 100000;
        } elseif($priceUnit == "Cr") {
            $ActualPrice = $onwardPrice * 10000000;
        } else {
            $ActualPrice = "";
        }
        
        
        $property->actual_price = $ActualPrice;
        $openspace = $request->input('openspace');
        $openspaceUnit = $request->input('openspace_unit');
        $property->openspace = $openspace . ' ' . $openspaceUnit;
        
        $area = $request->input('area');
        $areaUnit = $request->input('area_unit');
        $property->area = $area . ' ' . $areaUnit;
        $property->loan = $request->input('loan');
        $plot_size_from = $request->input('plot_size_from');
        $plot_size_fromUnit = $request->input('plot_size_from_unit');
        $property->plot_size_from = $plot_size_from . ' ' . $plot_size_fromUnit;        
        $plot_size_to = $request->input('plot_size_to');
        $plot_size_toUnit = $request->input('plot_size_to_unit');
        $property->plot_size_to = $plot_size_to . ' ' . $plot_size_toUnit; 
        if ($plot_size_fromUnit == "Sqft") {
            $plotareafrom = $plot_size_from;
        } elseif ($plot_size_fromUnit == "Sqm") {
            $plotareafrom = $plot_size_from * 10.764;
        } elseif ($plot_size_fromUnit == "Acre") {
            $plotareafrom = $plot_size_from * 43560;
        } else {
            $plotareafrom = "";
        }
        $property->plotareafrom = $plotareafrom;
        if ($plot_size_toUnit == "Sqft") {
            $plotareato = $plot_size_to;
        } elseif ($plot_size_toUnit == "Sqm") {
            $plotareato = $plot_size_to * 10.764;
        } elseif ($plot_size_toUnit == "Acre") {
            $plotareato = $plot_size_to * 43560;
        } else {
            $plotareato = "";
        }
        $property->plotareato = $plotareato;
        
        $property->offer = $request->input('offer');
        $property->country_id = $request->input('country_id');
        $property->state_id = $request->input('state_id');
        $property->dist_id = $request->input('dist_id');  
        $property->city_id = $request->input('city_id');
        $property->area_id = $request->input('area_id');
        $property->landmark = $request->input('landmark');
        
        $property->description = $request->input('description');
        // $property->property_size = $request->input('property_size');
        $property->address = $request->input('address');
        $property->short_address = $request->input('short_address');
        // $property->date = $request->input('date');
        $property->property_type_id = $request->input('property_type_id');
        $property->property_status_id = $request->input('property_status_id');
        $property->property_view_id = $request->input('property_view_id'); 
        $property->emerging_localities = $request->has('emerging_localities');
        $property->top_localities = $request->has('top_localities');
        $property->lat = $request->input('latitude');    
        $property->lng = $request->input('longitude'); 
        // $property->website = $request->input('website');          
        // $property->boundary_wall = $request->input('boundary_wall');         
        // $property->fsi = $request->input('fsi');     
        $property->possession = $request->input('possession');

        $property->investment_benifittitle = $request->input('investment_benifittitle');
        $property->investment_benifitdescription = $request->input('investment_benifitdescription');
        
        if ($request->hasFile('brochure')) {
            $brochureFile = $request->file('brochure');
            $brochureFileName = $brochureFile->getClientOriginalName();
            $destinationPath = './brochures';
            $brochureFile->move($destinationPath, $brochureFileName);
            $property->brochure = $brochureFileName;
            $property->save();  
        }
        if (request()->hasFile('investment_benifitimage')){
            $investment_benifitimage = $request->file('investment_benifitimage');
            $filename = $investment_benifitimage->getClientOriginalName();
            $destinationPath = './images/investment_benifit';
            $investment_benifitimage->move($destinationPath , $filename);
            $property->investment_benifitimage = $filename;
        }
        $property->save(); 
        $lastInsertedId = $property->id; 
        $features = $request->input('feature', []);
        $property->investmentbenifits()->delete(); // Delete existing features

        foreach ($features as $feature) {
            if (!empty($feature)) {
                $property->investmentbenifits()->create(['name' => $feature]);
            }
        }
        $youtubes = $request->input('youtube', []);
        $property->youtubes()->delete(); // Delete existing youtubes
            foreach ($youtubes as $youtube) {
                if (!empty($youtubes)) {
                    $property->youtubes()->create(['name' => $youtube]);
                }
            }
            
        $propertyfeatures = $request->input('propertyfeature', []);
        $property->propertyfeatures()->delete(); // Delete existing youtubes
            foreach ($propertyfeatures as $propertyfeature) {
                if (!empty($propertyfeature)) {
                    $property->propertyfeatures()->create(['feature' => $propertyfeature]);
                }
            }
            
        // start
        $locationconnection = $request->input('locationconnectivity', []);
        // print_r($locationconnectivities);exit;
        $property->locationconnectivities()->delete(); // Delete existing features

        foreach ($locationconnection as $locationconnectivity) {
            if (!empty($locationconnectivity)) {
                $property->locationconnectivities()->create(['name' => $locationconnectivity]);
            }
        }
        //end
        if ($request->hasFile('images')) {
            $uploadedImages = [];
            foreach ($request->file('images') as $imageFile) {
                $imageName = $imageFile->getClientOriginalName();
                $destinationPath = './images/property_images';
                $image = new Image();
                $image->property_id = $property->id;
                $image->name = $imageName;
                $image->save();
                $imageFile->move($destinationPath, $imageName);
                $uploadedImages[] = $imageName;
            }
            $property->images()->delete();
            foreach ($uploadedImages as $uploadedImage) {
                $image = new Image();
                $image->property_id = $property->id;
                $image->name = $uploadedImage;
                $image->save();
            }
        }
        if ($request->hasFile('layoutimages')) {
            $uploadedLayoutImages = [];
            foreach ($request->file('layoutimages') as $imageFile) {
                $imageName = $imageFile->getClientOriginalName();
                $destinationPath = './images/layoutimages';
                $layoutImage = new Layoutimage();
                $layoutImage->property_id = $property->id;
                $layoutImage->name = $imageName;
                $layoutImage->save();
                $imageFile->move($destinationPath, $imageName);
                $uploadedLayoutImages[] = $imageName;
            }
            $property->layoutimages()->delete(); // Assuming you have a method named 'layoutimages'
            foreach ($uploadedLayoutImages as $uploadedImage) {
                $layoutImage = new Layoutimage();
                $layoutImage->property_id = $property->id;
                $layoutImage->name = $uploadedImage;
                $layoutImage->save();
            }
        }
        if ($request->hasFile('actualimages')) {
            $uploadedActualImages = [];
            foreach ($request->file('actualimages') as $imageFile) {
                $imageName = $imageFile->getClientOriginalName();
                $destinationPath = './images/actualimages';
                $actualImage = new Actualimage();
                $actualImage->property_id = $property->id;
                $actualImage->name = $imageName;
                $actualImage->save();
                $imageFile->move($destinationPath, $imageName);
                $uploadedActualImages[] = $imageName;
            }
            $property->actualimages()->delete(); // Assuming you have a method named 'actualimages'
            foreach ($uploadedActualImages as $uploadedImage) {
                $actualImage = new Actualimage();
                $actualImage->property_id = $property->id;
                $actualImage->name = $uploadedImage;
                $actualImage->save();
            }
        }
        // echo "f";exit;
        $selectedCategoryIds = $request->input('propertycategory_id', []);
        if (!empty($selectedCategoryIds)) {
            $property->property_categoryids()->delete();
            foreach ($selectedCategoryIds as $selectedCategoryId) {
                $propertyCategoryid = new PropertyCategoryid();
                $propertyCategoryid->property_id = $lastInsertedId;
                $propertyCategoryid->property_category_id = $selectedCategoryId; 
                $propertyCategoryid->save();
            }
        }
        $selectedAminityIds = $request->input('aminities', []);   
        if (!empty($selectedAminityIds)) {
            $property->aminityids()->delete();            
            foreach ($selectedAminityIds as $selectedAminityId) {
                $aminityid = new Aminityid;
                $aminityid->property_id = $lastInsertedId;
                $aminityid->aminity_id = $selectedAminityId; 
                $aminityid->save();
            }
        }
        return redirect('properties')->with('success', 'Property Created Successfully.');
    }
   public function PropertviewUpdate(Request $request, $id)
    {
        $property = Property::findOrFail($id);
        $property->emerging_localities = $request->has('emerging_localities');
        $property->top_localities = $request->has('top_localities');
        $property->update(); 
        
        $lastInsertedId = $property->id; 
        $selectedCategoryIds = $request->input('propertycategory_id', []);
        if (!empty($selectedCategoryIds)) {
            $property->property_categoryids()->delete();
            foreach ($selectedCategoryIds as $selectedCategoryId) {
                $propertyCategoryid = new PropertyCategoryid();
                $propertyCategoryid->property_id = $lastInsertedId;
                $propertyCategoryid->property_category_id = $selectedCategoryId; 
                $propertyCategoryid->save();
            }
        }
        return redirect()->route('list.property_view')->with('success', 'Property View Updated Successfully.');
    }
    // function AddPropertyNewEnquiry(Request $request)
    // {
    //     $property = new PropertynewEnquiry();
    //     $property->property_id = $request->input('property_id');
    //     $property->name = $request->input('name');
    //     $property->mobilenumber = $request->input('number');
    //     $property->email = $request->input('email');
    //     $property->comment = $request->input('comment');
    //     $property->notification = "1";
    //     $property->source = "Website";
    //     $property->save();
    //     return redirect()->back()->with('success', 'Property Enquired Successfully.');
    // }
    public function PropertyEnquiry()
    {
        $propertyenquiry = Propertyenquiry::all();
        return view('property/property_enquiry', compact('propertyenquiry'));
    }
    public function PropertyWiseEnquiry()
    {
        if(Auth::user()->role == "admin"){
            $property = Property::with('propertyenquiries')->get();
        }else{
            $property = Property::where('user_id', Auth::user()->id)
                        ->with('propertyenquiries')->get();
        }
        return view('property/propertywise_enquiry', compact('property'));
    }
    public function getPropertyEnquiries($id)
    {
        $property = Property::find($id);
        $enquiries = $property->propertyenquiries;
        return response()->json($enquiries);
    }
    public function SEOProperty(request $request, $id)
    {
        $propertydata = Property::with('seos')
                    ->findOrFail($id);
        $images = Image::where('property_id', $id)->get();
        $actualimages = Actualimage::where('property_id', $id)->get();
        $layoutimages = Layoutimage::where('property_id', $id)->get();
        $propertyid = $id;
        return view('property/property_seo', compact('propertyid','propertydata','images','actualimages','layoutimages'));    
    }
    public function SEOSave(request $request)
    {
        $propertyId = $request->input('property_id');
        $property = Property::findOrFail($propertyId);
        $property->headingtag = $request->input('headingtag');
        $property->slug = $request->input('slug');
        $property->update(); 
        $seo = Seo::firstOrNew(['property_id' => $propertyId]); 
        $seo->metatitle = $request->input('metatitle');
        $seo->metadescription = $request->input('metadescription');
        $seo->metakeyword = $request->input('metakeyword');
        $seo->canonical = $request->input('canonical');
        $seo->schemacode = $request->input('schemacode');  
        $seo->save();
        $altTags = $request->input('alt_tags');
        foreach ($altTags as $imageId => $altText) {
            $image = Image::find($imageId);
            if ($image) {
                $image->aux1 = $altText;
                $image->save();
            }
        }
        $actualaltTags = $request->input('actualalt_tags');
        if (is_array($actualaltTags)) {
            foreach ($actualaltTags as $imageId => $altText) {
                $image = Actualimage::find($imageId);
                if ($image) {
                    $image->aux2 = $altText;
                    $image->save();
                }
            }
        }
        $layoutaltTags = $request->input('layoutalt_tags');
        if (is_array($layoutaltTags)) {
            foreach ($layoutaltTags as $imageId => $altText) {
                $image = Layoutimage::find($imageId);
                if ($image) {
                    $image->aux2 = $altText;
                    $image->save();
                }
            }
        }
        return redirect()->back()->with('success', 'Seo created successfully.');
    }
    public function AllEnquiry()
    {
        if (Auth::user()->role == "admin") 
        {
            // $propertyenquiry = Property::with('propertyenquiries')->get();
            $propertyenquiry = Property::with(['propertyenquiries' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }])->get();

        } elseif(Auth::user()->role == "seller" ) {
            $propertyenquiry = Property::where('user_id', Auth::user()->id)
                        ->with('propertyenquiries')->orderBy('created_at', 'desc')->get();
        } else {
            
        }
        return view('property/allproperty_enquiry', compact('propertyenquiry'));    
    }
    public function editEnquiryData(Request $request, $id)
    {
        $propertyenquiry = Propertyenquiry::find($id);
        $enquiryhistory = Enquiryhistory::with('users')
                            ->where('enquiry_id', $id)
                            ->get();
        return view('property.propety_enquiryedit', compact('propertyenquiry','enquiryhistory'));
    }
    public function updateEnquiryData(Request $request, $id)
    {
        $propertyenquiry = Propertyenquiry::find($id);
        $propertyenquiry->name = $request->input('name');
        $propertyenquiry->email = $request->input('email');
        $propertyenquiry->source = $request->input('source');
        $propertyenquiry->comment = $request->input('comment');
        $propertyenquiry->status = $request->input('status');
        $propertyenquiry->update();
        $enquiryhistory = new Enquiryhistory ;
        $enquiryhistory->enquiry_id = $id;
        $enquiryhistory->user_id = Auth::user()->id;
        $enquiryhistory->remark = $request->input('remark');
        $enquiryhistory->status = $request->input('status');
        $enquiryhistory->reason = $request->input('reason');
        $enquiryhistory->save();
        return redirect()->route('list.enquiry')->with('status','Enquiry Data Updated Successfully');
    }
    public function deleteEnquiryData(Request $request, $id)
    {
        $propertyenquiry = Propertyenquiry::find($id);
        $propertyenquiry->enquiryhistories()->delete();
        $propertyenquiry->delete();
        return redirect()->back()->with('danger', 'Enquiry deleted successfully.');
    }
    public function SeenEnquiry(Request $request)
    {
         $user = Auth::user();
        if ($user->role == "admin") {
            return redirect()->route('list.enquiry');
        } elseif ($user->role == "seller") {
            // Reference code to get property ids
            $propertyIds = Property::where('user_id', $user->id)->with('propertyenquiries')->pluck('id');
            // Update notification field for Propertyenquiries with matching property_id
            Propertyenquiry::whereIn('property_id', $propertyIds)
                ->update(['notification' => 'Seen']);
            return redirect()->route('list.enquiry');
        } else {
        }
    }
    public function WebsiteEnquiry(Request $request)
    {
        $websiteenquiry = Enquiry::orderBy('created_at', 'desc')->get();
        return view('property/website_enquiry', compact('websiteenquiry'));
    }
    public function WebsiteEnquiryEditData(Request $request, $id)
    {
        $websiteenquiry = Enquiry::find($id);
        $Websitehistory = Websiteenquiryhistory::with('users')
                             ->where('enquiry_id', $id)
                             ->get();
        return view('property/editwebsite_enquiry', compact('websiteenquiry','Websitehistory'));
    }
    public function WebsiteEnquiryUpdateData(Request $request, $id)
    {
        $enquiry = Enquiry::find($id);
        $enquiry->name = $request->input('name');
        $enquiry->email = $request->input('email');
        $enquiry->city = $request->input('city');
        $enquiry->size = $request->input('size');
        $enquiry->area = $request->input('area');
        $enquiry->budget = $request->input('budget');
        $enquiry->source = $request->input('source');
        $enquiry->comment = $request->input('comment');
        $enquiry->status = $request->input('status');
        $enquiry->update();
        $websiteenquiryhistory = new Websiteenquiryhistory();
        $websiteenquiryhistory->enquiry_id = $id;
        $websiteenquiryhistory->user_id = Auth::user()->id;
        $websiteenquiryhistory->remark = $request->input('remark');
        $websiteenquiryhistory->status = $request->input('status');
        $websiteenquiryhistory->reason = $request->input('reason');
        $websiteenquiryhistory->save();
        return redirect()->route('website.enquiry')->with('status','Website Enquiry Data Updated Successfully');
    }
    public function WebsiteEnquiryDeleteData(Request $request, $id)
    {
        $enquiry = Enquiry::find($id);
        $enquiry->websiteenquiryhistories()->delete();
        $enquiry->delete();
        return redirect()->back()->with('danger', 'Enquiry deleted successfully.');
    }
    public function AllProjectNewEnquiry()
    {
        $propertynewenquiry = PropertynewEnquiry::with('properties')->get();
        return view('property/allproject_newenquiry', compact('propertynewenquiry'));    
    }
    public function editProjectNewEnquiry(Request $request, $id)
    {
        $websitepropertyenquiry = PropertynewEnquiry::find($id);
        $WebsitePropertynewhistory = PropertynewEnquiryhistory::with('users')
                                     ->where('propertynew_enquiry_id', $id)
                                     ->get();
        return view('property/editwebsite_project_enquiry', compact('websitepropertyenquiry','WebsitePropertynewhistory'));
    }
    public function updatePropertyStatus(Request $request)
    {
       $propertId = $request->input('propertId');
        $status = Property::where('id', $propertId)->pluck('status')->first();
        if($status == 1){
            $user = Property::findOrFail($propertId);
            $user->status = 2;
            $user->update();
            return response()->json(['success' => true]);
        }elseif($status == 2){
            $user = Property::findOrFail($propertId);
            $user->status = 1;
            $user->update();
            return response()->json(['success' => true]);
        }else{
        return response()->json(['success' => false]);
        }
    }
    public function UpdateProjectNewEnquiry(Request $request, $id)
    {
        $propertynew_enquiries = PropertynewEnquiry::find($id);
        $propertynew_enquiries->status = $request->input('status');
        $propertynew_enquiries->update();
        $propertynew_enquiryhistory = new PropertynewEnquiryhistory ;
        $propertynew_enquiryhistory->propertynew_enquiry_id = $id;
        $propertynew_enquiryhistory->user_id = Auth::user()->id;
        $propertynew_enquiryhistory->remark = $request->input('remark');
        $propertynew_enquiryhistory->status = $request->input('status');
        $propertynew_enquiryhistory->reason = $request->input('reason');
        
        $propertynew_enquiryhistory->save();
        return redirect()->route('list.project.enquiry')->with('status','Website Project Enquiry Data Updated Successfully');
    }
     function AddPropertyEnquiry(Request $request)
    {
        
        $property = new Propertyenquiry();
        $property->user_id = Auth::user()->id;
        $pid = $property->property_id = $request->input('property_id');
        $name = $property->name = $request->input('nan');
        $phone = $property->mobilenumber = $request->input('num');
        $email = $property->email = $request->input('eoe');
        $comment = $property->comment = $request->input('coc');
        $property->notification = "1";
        $property->source = "Website";
        $property->save();
        // return redirect()->back()->with('success', 'Property Enquired Successfully.');
        $property = Property::find($pid);       
        $property_name = $property->title;
        
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
