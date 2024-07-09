<?php

namespace App\Http\Controllers;
use App\Models\Aminity;

use Illuminate\Http\Request;

class AminityController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkSession');
    }
    public function index(Request $request)
    {
        $aminity = Aminity::all();
        return view('master/aminity/aminity_index', compact('aminity'));
    }
    public function Saveaminity(Request $request)
    {
        $aminity = new Aminity;
        $aminity->name = $request->input('name');
         if (request()->hasFile('image')){
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $aminity->image = $filename;
            $destinationPath = './images/aminity';
            $image->move($destinationPath , $filename);
        }
        $aminity->save();
        return redirect()->back()->with('success', 'Aminity created successfully.');
    }
    public function aminityEdit(Request $request)
    {
        $id = $request->input('id');
        $data = Aminity::find($id);
        return response()->json($data);
    }
    public function aminityUpdate(Request $request)
    {
        $id = $request->input('id');
        $aminity = Aminity::find($id);
        $aminity->name = $request->input('name');
        if (request()->hasFile('image')){
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $aminity->image = $filename;
            $destinationPath = './images/aminity';
            $image->move($destinationPath , $filename);
        }
        $aminity->save();
        return redirect()->back()->with('success', 'Aminity updated successfully.');
    } 
}
