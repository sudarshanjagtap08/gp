<?php

namespace App\Http\Controllers;
use App\Models\Checklist;
use App\Models\Favorite;
use App\Models\Propertyseen;
use App\Models\Propertyenquiry;
use auth;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkSession');
    }
    public function checklist_index(Request $request)
    {
        $checklist = Checklist::all();
        return view('master/checklist/checklist_index', compact('checklist'));
    }
    public function Savechecklist(Request $request)
    {
        $checklist = new Checklist;
        $checklist->title = $request->input('title');
        $checklist->description = $request->input('description');        
        if (request()->hasFile('image')){
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $checklist->image = $filename;
            $destinationPath = './images/checklist';
            $image->move($destinationPath , $filename);
        }
        $checklist->save();
        return redirect()->back()
            ->with('success', 'Checklist created successfully.');
    }
    public function ChecklistEdit(Request $request)
    {
        $id = $request->input('id');
        $data = Checklist::find($id);
        return response()->json($data);
    }
    public function ChecklistUpdate(Request $request)
    {
        $id = $request->input('id');
        $checklist = Checklist::find($id);
        $checklist->title = $request->input('title');
        $checklist->description = $request->input('description');        
        if (request()->hasFile('image')){
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $checklist->image = $filename;
            $destinationPath = './images/checklist';
            $image->move($destinationPath , $filename);
        }
        $checklist->save();
        return redirect()->back()->with('success', 'Checklist updated successfully.');
    }  
    public function ShortlistPropertyindex(Request $request)
    {
        $property = Favorite::where('user_id', Auth::user()->id)
                    ->with('property.country', 'property.state', 'property.city', 'property.propertyType', 'property.propertyView', 'property.propertyStatus', 'property.images', 'property.propertyCategoryids.property_categories')
                    ->get();
        $title = "Your Shortlisted Properties";
        return view('master/checklist/checklist_adminindex', compact('property', 'title'));
    }
    public function ViewedPropertyindex(){
        $property = Propertyseen::where('user_id', Auth::user()->id)
                    ->with('property.country', 'property.state', 'property.city', 'property.propertyType', 'property.propertyView', 'property.propertyStatus', 'property.images', 'property.propertyCategoryids.property_categories')
                    ->get();
        $title = "Your Viewed Properties";
        return view('master/checklist/checklist_adminindex', compact('property', 'title'));
    }
    public function ContactedPropertyindex(){
        $property = Propertyenquiry::where('user_id', Auth::user()->id)
                    ->with('property.country', 'property.state', 'property.city', 'property.propertyType', 'property.propertyView', 'property.propertyStatus', 'property.images', 'property.propertyCategoryids.property_categories')
                    ->get();
        $title = "Your Contacted Properties";
        return view('master/checklist/checklist_adminindex', compact('property', 'title'));
    }
    
}
