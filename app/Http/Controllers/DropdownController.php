<?php

namespace App\Http\Controllers;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\District;
use App\Models\Area;
use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkSession');
    }
    public function pincode()
    {
        return view('master/country/pincode_index');
    }
    public function index()
    {
        $countries = Country::all();
        $states = State::all();
        $districts = District::all();
        $cities = City::all();
        $areas = Area::all();
        return view('master/country/country_index', compact('countries', 'states', 'districts', 'cities', 'areas'));
    }
    public function CountryStore(Request $request)
    {
        Country::create($request->all());
        return redirect()->back()
            ->with('success', 'Country created successfully.');
    }
    public function CountryEdit(Request $request)
    {
        $id = $request->input('id');
        $data = Country::find($id);
        return response()->json($data);
    }
    public function CountryUpdate(Request $request)
    {
        $id = $request->input('id');
        $data = Country::find($id);

        if (!$data) {
            return response()->json(['error' => 'Country not found'], 404);
        }

        $newName = $request->input('name');
        $data->name = $newName;
        $data->save();

        return redirect()->back()->with('success', 'Country updated successfully.');
    }    
    public function StateStore(Request $request)
    {
        State::create($request->all());
        return redirect()->back()
            ->with('success', 'State created successfully.');
    }
    public function StateEdit(Request $request)
    {
        $id = $request->input('id');
        $data = State::find($id);
        return response()->json($data);
    }
    public function StateUpdate(Request $request)
    {
        $id = $request->input('id');
        $data = State::find($id);    
        if (!$data) {
            return response()->json(['error' => 'State not found'], 404);
        }
        $newStateName = $request->input('state_name');
        $data->name = $newStateName;
        // Get the new country name from the request
        $newCountryName = $request->input('country_name');
        // Find the country by name
        $country = Country::where('name', $newCountryName)->first();
        if (!$country) {
            return response()->json(['error' => 'Country not found'], 404);
        }    
        // Update the state's associated country
        $data->country_id = $country->id;        
        $data->save();    
        return redirect()->back()->with('success', 'State and Country updated successfully.');
    }
    public function DistStore(Request $request)
    {
        $district = new District;
        $district->name = $request->input('name');
        $district->state_id = $request->input('state_id');        
        $district->save();
        return redirect()->back()
            ->with('success', 'City created successfully.');
    } 
    public function DistEdit(Request $request)
    {
        $id = $request->input('id');
        $data = District::find($id);
        return response()->json($data);
    }
    public function DistUpdate(Request $request)
    {
        $id = $request->input('id');
        $data = District::find($id);
        if (!$data) {
            return response()->json(['error' => 'District not found'], 404);
        }
        $newDistName = $request->input('dist_name');
        $data->name = $newDistName;
        $newStateId = $request->input('state_id');
        $data->state_id = $newStateId;
        $data->save();
        return redirect()->back()->with('success', 'District updated successfully.');
    }
    
    public function CityStore(Request $request)
    {
        $city = new City;
        $city->name = $request->input('name');
        $city->dist_id = $request->input('dist_id');        
        if (request()->hasFile('image')){
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $destinationPath = './images/city';
            $image->move($destinationPath , $filename);
            $city->image = $filename;
        }
        $city->save();
        return redirect()->back()
            ->with('success', 'City created successfully.');
    }

    public function CityEdit(Request $request)
    {
        $id = $request->input('id');
        $data = City::find($id);
        return response()->json($data);
    }

    public function CityUpdate(Request $request)
    {
        $id = $request->input('id');
        $data = City::find($id);
        if (!$data) {
            return response()->json(['error' => 'City not found'], 404);        }
        $newCityName = $request->input('city_name');
        $data->name = $newCityName;
        $newDistId = $request->input('dist_id');
        $data->dist_id = $newDistId;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $data->image = $fileName;
            $image->storeAs('city', $fileName, 'public');
        }
        $data->save();
        return redirect()->back()->with('success', 'City updated successfully.');
    }
    public function AreaStore(Request $request)
    {
        $area = new Area;
        $area->name = $request->input('name');
        $area->city_id = $request->input('city_id');   
        $area->save();
        return redirect()->back()
            ->with('success', 'City created successfully.');
    }
    public function AreaEdit(Request $request)
    {
        $id = $request->input('id');
        $data = Area::find($id);
        return response()->json($data);
    }
    public function AreaUpdate(Request $request)
    {
       
        $id = $request->input('id');
        $data = Area::find($id);
        if (!$data) {
            return response()->json(['error' => 'Area not found'], 404);        }
        $newAreaName = $request->input('area_name');
        $data->name = $newAreaName;
        $newAreaId = $request->input('city_id');
        $data->city_id = $newAreaId;
        $data->save();
        return redirect()->back()->with('success', 'Area updated successfully.');
    }
    public function getStates(Request $request)
    {
        $country_id = $request->input('country_id');
        $states = State::where('country_id', $country_id)->get();
        return response()->json($states);
    }
    public function getDistrict(Request $request)
    {
        $state_id = $request->input('state_id');
        $districts = District::where('state_id', $state_id)->get();
        return response()->json($districts);
    }
    public function getCities(Request $request)
    {
        $dist_id = $request->input('dist_id');
        $cities = City::where('dist_id', $dist_id)->get();
        return response()->json($cities);
    }
    public function getAreas(Request $request)
    {
        $city_id = $request->input('city_id');
        $areas = Area::where('city_id', $city_id)->get();
        return response()->json($areas);
    }
    
}
