<?php

namespace App\Http\Controllers;
use App\Models\Benefit;
use App\Models\What_do_we_do;
use App\Models\Key_Service;
use Illuminate\Http\Request;

class BenefitController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkSession');
    }
    public function benefit_index(Request $request)
    {
        $benefit = Benefit::all();
        return view('master/benefit/benefit_index', compact('benefit'));
    }
    public function Savebenefit(Request $request)
    {
        $benefit = new Benefit;
        $benefit->title = $request->input('title');
        $benefit->description = $request->input('description');        
        
        if (request()->hasFile('image')){
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $benefit->image = $filename;
            $destinationPath = './images/benefit';
            $image->move($destinationPath , $filename);
        }
        $benefit->save();
        return redirect()->back()
            ->with('success', 'benefit created successfully.');
    }
    public function BenefitsEdit(Request $request)
    {
        $id = $request->input('id');
        $data = Benefit::find($id);
        return response()->json($data);
    }
    public function BenefitsUpdate(Request $request)
    {
        $id = $request->input('id');
        $benefit = Benefit::find($id);
        $benefit->title = $request->input('title');
        $benefit->description = $request->input('description');        
       if (request()->hasFile('image')){
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $benefit->image = $filename;
            $destinationPath = './images/benefit';
            $image->move($destinationPath , $filename);
        }
        $benefit->save();
        return redirect()->back()->with('success', 'benefit updated successfully.');
    } 
    public function what_do_we_do_index(Request $request)
    {
        $what_do_we_do = What_do_we_do::all();
        return view('master/benefit/what_do_we_do_index', compact('what_do_we_do'));
    }
    public function SaveWhatDoWeDo(Request $request)
    {
        $what_do_we_do = new What_do_we_do;
        $what_do_we_do->title = $request->input('title');
        $what_do_we_do->description = $request->input('description');        
        $what_do_we_do->save();
        return redirect()->back()
            ->with('success', 'what do we do created successfully.');
    }
    public function WhatDoWeDoEdit(Request $request)
    {
        $id = $request->input('id');
        $data = What_do_we_do::find($id);
        return response()->json($data);
    }
    public function WhatDoWeDoUpdate(Request $request)
    {
        $id = $request->input('id');
        $what_do_we_do = What_do_we_do::find($id);
        $what_do_we_do->title = $request->input('title');
        $what_do_we_do->description = $request->input('description');        
        $what_do_we_do->save();
        return redirect()->back()->with('success', 'what do we do updated successfully.');
    } 
    public function key_services_index(Request $request)
    {
        $key_services = Key_Service::all();
        return view('master/benefit/key_services_index', compact('key_services'));
    }
    public function SaveKeyServices(Request $request)
    {
        $key_service = new Key_Service;
        $key_service->title = $request->input('title');
        $key_service->description = $request->input('description');    
        if (request()->hasFile('image')){
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $key_service->image = $filename;
            $destinationPath = './images/key_service';
            $image->move($destinationPath , $filename);
        }
        $key_service->save();
        return redirect()->back()
            ->with('success', 'key_service created successfully.');
    }
    public function KeyServicesEdit(Request $request)
    {
        $id = $request->input('id');
        $data = Key_Service::find($id);
        return response()->json($data);
    }
    public function KeyServicesUpdate(Request $request)
    {
        $id = $request->input('id');
        $key_service = Key_Service::find($id);
        $key_service->title = $request->input('title');
        $key_service->description = $request->input('description');        
        if (request()->hasFile('image')){
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $key_service->image = $filename;
            $destinationPath = './images/key_service';
            $image->move($destinationPath , $filename);
        }
        $key_service->save();
        return redirect()->back()->with('success', 'key_service updated successfully.');
    } 
}
