<?php

namespace App\Http\Controllers;
use App\Models\PropertyType;
use App\Models\PropertyCategory;

use Illuminate\Http\Request;

class PropertytypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkSession');
    }
    public function index()
    {
        $property_type = PropertyType::all();
        return view('list/propertytype/types_of_land_index', compact('property_type'));    
    }
    public function AddPropertyType(Request $request)
    {
        return view('list/propertytype/types_of_land_add');   
    }
    public function SavePropertyType(Request $request)
    {
        $property_type = new PropertyType();
        $property_type->name = $request->input('name');
        if (request()->hasFile('image')){
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $property_type->image = $filename;
            $destinationPath = './images/propertytype';
            $image->move($destinationPath , $filename);
        }
        $property_type->save();
        return redirect()->route('types_of_land');   
    }
    public function EditPropertyType(Request $request, $id)
    {
        $propertytype = PropertyType::find($id);
        return view('list/propertytype/types_of_land_edit', compact('propertytype')); 
    }
    public function UpdatePropertyType(Request $request, $id)
    {
        $property_type = PropertyType::find($id);
        $property_type->name = $request->input('name');
        $property_type->aux2 = $request->input('aux2');
        $property_type->aux3 = $request->input('aux3');
        $property_type->aux4 = $request->input('aux4');
        if (request()->hasFile('image')){
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $property_type->image = $filename;
            $destinationPath = './images/propertytype';
            $image->move($destinationPath , $filename);
        }
        $property_type->update();
        return redirect()->route('types_of_land'); 
    }
    public function property_categorycrudindex()
    {
        $propertycategory = PropertyCategory::all();
        return view('list/propertycategory/propertycategory_index', compact('propertycategory'));    
    }
    public function SavePropertyCategory(Request $request)
    {
        PropertyCategory::create($request->all());
        return redirect()->back()
            ->with('success', 'Proprty Category created successfully.');
    }
    public function CategoryEdit(Request $request)
    {
        $id = $request->input('id');
        $data = PropertyCategory::find($id);
        return response()->json($data);
    }
    public function CategoryUpdate(Request $request)
    {
        $id = $request->input('id');
        $data = PropertyCategory::find($id);
        $newName = $request->input('name');
        $data->name = $newName;
        $data->save();
        return redirect()->back()->with('success', 'Category updated successfully.');
    }    
}
