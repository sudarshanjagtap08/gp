<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Propertyseen;
use App\Models\Favorite;
use auth;
use App\Models\Property;
use App\Models\Propertyenquiry;
use App\Models\Popup;
use App\Models\Userinfo;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkSession');
    }
    public function updateUserStatusById(Request $request)
    {
        $selectedIds = $request->input('selected_ids', []);
        $action = $request->input('action');
        if ($action === 'active') {
            User::whereIn('id', $selectedIds)->update(['status' => 1]);
        } elseif ($action === 'inactive') {
            User::whereIn('id', $selectedIds)->update(['status' => 2]);
        }
        return redirect()->back()->with('success', 'User updated successfully.');
    }
    public function UserEdit($id)
    {
        $data = User::find($id);
        return response()->json($data);
    }
    public function UserDelete(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) 
        {
            $user->userInfos()->delete();
            $user->delete();
            return redirect()->back()->with('success', 'User deleted successfully.');
        } else 
        {
            return redirect()->back()->with('error', 'User not found');
        }
    }
    public function updateUserStatus(Request $request)
    {
       $userId = $request->input('userId');
        $status = User::where('id', $userId)->pluck('status')->first();
        if($status == 1){
            $user = User::findOrFail($userId);
            $user->status = 2;
            $user->update();
            return response()->json(['success' => true]);
        }elseif($status == 2){
            $user = User::findOrFail($userId);
            $user->status = 1;
            $user->update();
            return response()->json(['success' => true]);
        }else{
        return response()->json(['success' => false]);
        }
    }

    public function UserUpdate(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id);    
        $user->status = $request->input('status');
        $user->save();
        return redirect()->back()->with('success', 'User updated successfully.');
    }
    public function UserAllList(){
        $users = User::with('userloginhistories')->get();
        return view('list/user/userlistindex', compact('users')); 
    }
    public function getUserLoginHis($id)
    {
        $user = User::findOrFail($id);
        $userhistory = $user->userloginhistories()->orderBy('last_login_date_time', 'desc')->get();
        // $userhistory = $user->userloginhistories;
        return response()->json($userhistory);
    }
    public function userList(Request $request, $value)
    { 
        if($value=="buyer")
        {
            $users = User::where('role', 'buyer')->get();
            foreach ($users as $user) {
                $user->shortlistedCount = Favorite::where('user_id', $user->id)->count();
            }
            foreach ($users as $user) {
                $user->propertyseenCount = Propertyseen::where('user_id', $user->id)->count();
            }
            foreach ($users as $user) {
                $user->propertyenquiryCount = Propertyenquiry::where('user_id', $user->id)->count();
            }
        }elseif($value=="seller")
        {
            $users = User::where('role', 'seller')->get();
            foreach ($users as $user) {
                $user->shortlistedCount = Favorite::where('user_id', $user->id)->count();
            }
            foreach ($users as $user) {
                $user->propertyseenCount = Propertyseen::where('user_id', $user->id)->count();
            }
            foreach ($users as $user) {
                $user->propertyenquiryCount = Propertyenquiry::where('user_id', $user->id)->count();
            }
        }else
        {
            echo "somthing wrong";exit;
        }
        return view('list/user/userindex', compact('users','value')); 
    }
    public function buyerindex()
    {
        $buyers = User::where('role', 'buyer')->get();
        foreach ($buyers as $buyer) {
            $buyer->shortlistedCount = Favorite::where('user_id', $buyer->id)->count();
        }
        foreach ($buyers as $buyer) {
            $buyer->propertyseenCount = Propertyseen::where('user_id', $buyer->id)->count();
        }
        foreach ($buyers as $buyer) {
            $buyer->propertyenquiryCount = Propertyenquiry::where('user_id', $buyer->id)->count();
        }
        return view('list/user/buyerindex', compact('buyers'));
    }
    public function shortlistedlistbuyerwise(Request $request, $id , $name)
    { 
        $favpropertyids = Favorite::where('user_id', $id)->pluck('property_id')->toArray();
        $property = Property::where('id', $favpropertyids)
                                ->with('property_categoryids.property_categories')->get();
        $properties = Property::whereIn('id', $favpropertyids)
                                ->with('property_categoryids.property_categories') // Assuming you have relationships defined
                                ->get();
        $propertytitle = "Shortlisted Property List by";
        $pagetitle = $propertytitle .' '. $name ;
        return view('list/user/listpropertybuyerwiseindex', compact('properties','name','pagetitle'));     
    }
    public function seenpropertylistbuyerwise(Request $request, $id , $name)
    { 
        $seenpropertyids = Propertyseen::where('user_id', $id)->pluck('property_id')->toArray();
        $property = Property::where('id', $seenpropertyids)
                                ->with('property_categoryids.property_categories')->get();
        $properties = Property::whereIn('id', $seenpropertyids)
                                ->with('property_categoryids.property_categories') // Assuming you have relationships defined
                                ->get();
        $propertytitle = "Viewed Property List by";
        $pagetitle = $propertytitle .' '. $name ;
        return view('list/user/listpropertybuyerwiseindex', compact('properties','name','pagetitle'));     
    }
    public function enquirypropertylistbuyerwise(Request $request, $id , $name)
    { 
        $propertyenquiryids = Propertyenquiry::where('user_id', $id)->pluck('property_id')->toArray();
        $property = Property::where('id', $propertyenquiryids)
                                ->with('property_categoryids.property_categories')->get();
        $properties = Property::whereIn('id', $propertyenquiryids)
                                ->with('property_categoryids.property_categories') // Assuming you have relationships defined
                                ->get();
        $propertytitle = "Enquired Property List by";
        $pagetitle = $propertytitle .' '. $name ;
        return view('list/user/listpropertybuyerwiseindex', compact('properties','pagetitle'));     
    }
    public function propertyindex()
    {
        if(Auth::user()->role == "admin")
        {
            $properties = Property::get();
            foreach ($properties as $property) {
                $property->shortlistedCount = Favorite::where('property_id', $property->id)->count();
            }
            foreach ($properties as $property) {
                $property->propertyseenCount = Propertyseen::where('property_id', $property->id)->count();
            }
            foreach ($properties as $property) {
                $property->propertyenquiryCount = Propertyenquiry::where('property_id', $property->id)->count();
            }
            return view('list/user/propertywiseditailsindex', compact('properties'));
        }else{
            $userid = Auth::user()->id;
            $properties = Property::where('user_id', $userid)->get();
            foreach ($properties as $property) {
                $property->shortlistedCount = Favorite::where('property_id', $property->id)->count();
            }
            foreach ($properties as $property) {
                $property->propertyseenCount = Propertyseen::where('property_id', $property->id)->count();
            }
            foreach ($properties as $property) {
                $property->propertyenquiryCount = Propertyenquiry::where('property_id', $property->id)->count();
            }
            return view('list/user/propertywiseditailsindex', compact('properties')); 
        }
    }
    public function shortlistedlistpropertywise(Request $request, $id , $name)
    {
        $favuserids = Favorite::where('property_id', $id)->pluck('user_id')->toArray();
        $users = User::whereIn('id', $favuserids)
                                ->get();
        $usertitle = "Shortlisted User List by";
        $pagetitle = $usertitle .' '. $name ;
        return view('list/user/listuserbuyerwiseindex', compact('users','pagetitle'));     
    }
    public function seenlistedlistpropertywise(Request $request, $id , $name)
    {
        $seenuserids = Propertyseen::where('property_id', $id)->pluck('user_id')->toArray();
        $users = User::whereIn('id', $seenuserids)
                                ->get();
        $usertitle = "Seen User List by";
        $pagetitle = $usertitle .' '. $name ;
        return view('list/user/listuserbuyerwiseindex', compact('users','pagetitle'));     
    }
    public function enquirylistedlistpropertywise(Request $request, $id , $name)
    {
        $enquiryuserids = Propertyenquiry::where('property_id', $id)->pluck('user_id')->toArray();
        $users = User::whereIn('id', $enquiryuserids)
                                ->get();
        $usertitle = "Seen User List by";
        $pagetitle = $usertitle .' '. $name ;
        return view('list/user/listuserbuyerwiseindex', compact('users','pagetitle'));     
    }
    public function PopUpindex()
    {
        $popup = Popup::all();
        return view('list/popup/popupindex', compact('popup')); 
    }
    public function PopupEdit(Request $request)
    {
        $id = $request->input('id');
        $data = Popup::find($id);
        return response()->json($data);
    }
    public function PopupUpdate(Request $request)
    {
        $id = $request->input('id');
        $popup = Popup::findOrFail($id);
        $popup->link = $request->input('link');
        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $popup->image = $filename;
            $destinationPath = './images/popup';
            $image->move($destinationPath , $filename);
        }
        $popup->save();
        return redirect()->back()->with('success', 'Popup Image updated successfully.');
    }

}
