<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Userinfo;
use App\Models\Propertyseen;
use App\Models\Propertyenquiry;
use App\Models\Favorite;
use auth;

use Illuminate\Support\Facades\Hash;  
class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('checkSession');
    // }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == "buyer")
        {
            return redirect()->route('shortlistpropertyindex');
            // return redirect()->route('website.index');
        }
        else {
            return redirect()->route('properties');
            // return view('dashboard');
        }
    }
    public function getProfile(Request $request)
    {
        $userId = Auth::user()->id;
        $userinfo = Userinfo::firstOrNew(['user_id' => $userId]); 
        $shortlistedCount = Favorite::where('user_id', $userId)->count();
        $propertyseenCount = Propertyseen::where('user_id', $userId)->count();
        $propertyenquiryCount = Propertyenquiry::where('user_id', $userId)->count();
        return view('profile', compact('userinfo','shortlistedCount','propertyseenCount','propertyenquiryCount'));
    }
    public function update_profile(Request $request)
    {
        
        $userId = Auth::user()->id;
        $userinfo = Userinfo::firstOrNew(['user_id' => $userId]);    
        $userinfo->company_name = $request->input('company_name');
        $userinfo->type = $request->input('type');
        $userinfo->address = $request->input('address');
        $userinfo->city = $request->input('city');
        $userinfo->pincode = $request->input('pincode');  
        $userinfo->contact_number = $request->input('contact_number');  
        $userinfo->whatsapp_number = $request->input('whatsapp_number');  
        $userinfo->occupation = $request->input('occupation');
        $userinfo->save();
        
        $res= User::find($userId);
        $res->name=$request->input('name');
        $res->email=$request->input('email');
        $password = $request->input('password');
        $password1 = $request->input('passwordconfirm');
         if (request()->hasFile('image')){
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $res->image = $filename;
            $destinationPath = './images/userinfo';
            $image->move($destinationPath , $filename);
        }
        if($password === $password1 )
        {
            $res->name=$request->input('name');
            $res->email=$request->input('email');
            $res->password = Hash::make($password);
            $res->save();
            $request->session()->flash('status', 'Username & Password Data Updated SuccessFully');
            return redirect ('profile');
        }else{
            echo"Password Is Not match";
            exit();
        }
        $res->save();
        $request->session()->flash('status', 'Data Updated SuccessFully');
        return redirect ('profile');
    }
}
