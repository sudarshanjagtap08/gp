<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Disclaimer;
use App\Models\Property;
use App\Models\Enquiry;
use App\Models\Subscribe; 
use App\Models\Newlaunchprojects;
use App\Models\Requirement; 
use App\Models\Subscribehistory; 
use auth;
use App\Models\Exclusive_project;
use App\Models\Readypossessionproject;
use App\Models\Toparea;
use App\Models\Blogcomment;
use App\Models\Lsikeyword;
class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkSession');
    }
    public function aboutus(Request $request)
    {
        $aboutus = About::all();
        return view('master/about/aboutus_index', compact('aboutus'));
    }
    public function Saveaboutus(Request $request)
    {
        $about = new About;
        $about->title = $request->input('title');
        $about->short_description = $request->input('short_description');
        $about->description = $request->input('description');     
        if (request()->hasFile('image')){
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $about->image = $filename;
            $destinationPath = './images/about';
            $image->move($destinationPath , $filename);
        }
        $about->save();
        return redirect()->back()->with('success', 'About Us created successfully.');
    }
    public function aboutusEdit(Request $request, $id)
    {
        $aboutusdata = About::find($id);
        return view('master/about/aboutus_edit', compact('aboutusdata'));
    }
    public function aboutusUpdate(Request $request)
    {
        $id = $request->input('id');
        $about = About::find($id);
        $about->title = $request->input('title');
        $about->short_description = $request->input('short_description');        
        $about->description = $request->input('description'); 
        if (request()->hasFile('image')){
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $about->image = $filename;
            $destinationPath = './images/about';
            $image->move($destinationPath , $filename);
        }
        $about->save();
        return redirect()->route('aboutus')->with('success', 'About us updated successfully.');
    } 
    public function disclaimer(Request $request)
    {
        $disclaimer = Disclaimer::all();
        return view('master/disclaimer/disclaimer_index', compact('disclaimer'));
    }
    public function Savedisclaimer(Request $request)
    {
        $disclaimer = new Disclaimer;
        $disclaimer->description = $request->input('description');   
        $disclaimer->save();
        return redirect()->back()->with('success', 'Disclaimer Us created successfully.');
    }
    public function disclaimerEdit(Request $request)
    {
        $id = $request->input('id');
        $data = Disclaimer::find($id);
        return response()->json($data);
    }
    public function disclaimerUpdate(Request $request)
    {
        $id = $request->input('id');
        $disclaimer = Disclaimer::find($id);    
        $disclaimer->description = $request->input('description');
        $disclaimer->save();
        return redirect()->back()->with('success', 'Disclaimer us updated successfully.');
    } 
    public function exclusive_project_index()
    {
        $exclusive_project = Exclusive_project::with('property')
                                ->get();
        $property = Property::all();
        $categoryIdHan = 1;
        $featured_properties = Property::with('property_categoryids.property_categories')
                ->whereHas('property_categoryids', function ($query) use ($categoryIdHan) {
                    $query->where('property_category_id', $categoryIdHan);
                })
            ->get();
        return view('master/exclusive_project/exclusive_project_index', compact('exclusive_project','property','featured_properties'));
    }
    public function exclusive_project_edit(Request $request)
    {
        $id = $request->input('id');
        $exclusive_project = Exclusive_project::find($id);
        return response()->json($exclusive_project);
    }
    
    public function exclusive_project_update(Request $request)
    {
        $id = $request->input('id');
        $exclusive_project = Exclusive_project::find($id);
        $exclusive_project->property_id = $request->input('property_name');
        $exclusive_project->save();
        return redirect()->back()->with('success', 'Exclusive Project updated successfully.');
    }
    public function new_launch_projects_index(Request $request)
    {
        $new_launch_projects = Newlaunchprojects::with('property')
                                ->get();  
        $property = Property::all();
        $readypossessionprojects = Readypossessionproject::with('property')
                                ->get();  
        return view('master/new_launch_projects/new_launch_projects_index', compact('new_launch_projects','property','readypossessionprojects'));
    }
    public function newlaunch_project_edit(Request $request)
    {
        $id = $request->input('id');
        $newlaunchprojects = Newlaunchprojects::find($id);
        return response()->json($newlaunchprojects);
    }
    public function new_launch_project_update(Request $request)
    {
        $id = $request->input('id');
        $exclusive_project = Newlaunchprojects::find($id);
        $exclusive_project->property_id = $request->input('property_name');
        $exclusive_project->save();
        return redirect()->back()->with('success', 'Exclusive Project updated successfully.');
    }
    public function new_launch_project_add(Request $request)
    {
        $newlaunchprojects =  New Newlaunchprojects();
        $newlaunchprojects->property_id = $request->input('property_name');
        $newlaunchprojects->save();
        return redirect()->back()->with('success', 'New Launch Project Inserted successfully.');
    }
    public function ready_possession_project_add(Request $request)
    {
        $readypossessionprojects =  New Readypossessionproject();
        $readypossessionprojects->property_id = $request->input('property_name');
        $readypossessionprojects->save();
        return redirect()->back()->with('success', 'New Ready Possession Project Inserted successfully.');
    }
    public function readypossession_project_edit(Request $request)
    {
        $id = $request->input('id');
        $readypossessionprojects = Readypossessionproject::find($id);
        return response()->json($readypossessionprojects);
    }
    public function readypossession_project_update(Request $request)
    {
        $id = $request->input('id');
        $exclusive_project = Readypossessionproject::find($id);
        $exclusive_project->property_id = $request->input('property_name');
        $exclusive_project->save();
        return redirect()->back()->with('success', 'Ready Possession Project updated successfully.');
    }
    public function SubscribedataIndex(Request $request)
    {
        $subscribe = Subscribe::orderBy('created_at', 'desc')->get();
        return view('list/subscribe/subscribe_index', compact('subscribe'));
    }
    public function SubscribeEditData(Request $request, $id)
    {
        $subscribe = Subscribe::find($id);
        // print_r($id);exit;
        $subscribehistory = Subscribehistory::with('users')
                            ->where('subscribe_id', $id)->get();
        // print_r($subscribehistory);exit;
        return view('list/subscribe/subscribe_editenquiry', compact('subscribe', 'subscribehistory'));
    }
    public function updateSubscribeData(Request $request, $id)
    {
        $subscribe = Subscribe::find($id);
        $subscribe->name = $request->input('name');
        $subscribe->email = $request->input('email');
        $subscribe->city = $request->input('city');
        $subscribe->source = $request->input('source');
        $subscribe->comment = $request->input('comment');
        $subscribe->status = $request->input('status');
        $subscribe->update();
        $subscribehistory = new Subscribehistory;
        $subscribehistory->subscribe_id = $id;
        $subscribehistory->user_id = Auth::user()->id;
        $subscribehistory->remark = $request->input('remark');
        $subscribehistory->status = $request->input('status');
        $subscribehistory->reason = $request->input('reason');
        $subscribehistory->save();
        return redirect()->route('subscribe.index')->with('status','Subscribe Data Updated Successfully');
    }
    public function SubscribeDeleteData(Request $request, $id)
    {
        $subscribe = Subscribe::find($id);
        $subscribe->subscribehistories()->delete();
        $subscribe->delete();
        return redirect()->back()->with('danger', 'Enquiry deleted successfully.');
    }
    // public function EnquirepopdataIndex(Request $request)
    // {
    //     $enquiry = Enquiry::all();
    //     return view('list/subscribe/enquiry_index', compact('subscribe'));
    // }
    public function requirement_index(Request $request)
    {
        if(Auth::user()->role == "admin")
        {
            $requirement = Requirement::all();
            return view('list/requirement/requirement_index', compact('requirement'));
        }else{
            $requirement = Requirement::where('user_id', $userid)->get();
            return view('list/requirement/requirement_index', compact('requirement'));
        }
       
    }
    public function requirement_add(Request $request)
    {
        $requirement = new Requirement;
        $requirement->user_id = Auth::user()->id;
        $requirement->name = $request->input('name');
        $requirement->mobilenumber = $request->input('mobilenumber');
        $requirement->email = $request->input('email');
        $requirement->city = $request->input('city');
        $requirement->size = $request->input('size');
        $requirement->budget = $request->input('budget');
        $requirement->area = $request->input('area');
        $requirement->comment = $request->input('comment');
        $requirement->save();
        return redirect()->back()->with('success', 'Requirement Added successfully.');
    }
    public function requirementEditData(Request $request)
    {
        $id = $request->input('id');
        $requirement = Requirement::find($id);
        return response()->json($requirement);
    }
    public function updateRequirement(Request $request)
    {
        $id = $request->input('requirementId');
        $requirement = Requirement::find($id);
        $requirement->name = $request->input('name');
        $requirement->mobilenumber = $request->input('mobilenumber');
        $requirement->email = $request->input('email');
        $requirement->city = $request->input('city');
        $requirement->size = $request->input('size');
        $requirement->budget = $request->input('budget');
        $requirement->area = $request->input('area');
        $requirement->comment = $request->input('comment');
        $requirement->save();
        return redirect()->back()->with('success', 'Requirement Updated successfully.');
    }
    public function topareastoinvest(Request $request)
    {  
        $toparea = Toparea::all();
        return view('master/topareastoinvest/topareastoinvest_index', compact('toparea'));
    }
    public function Savetopareastoinvest(Request $request)
    {
        Toparea::create($request->all());
        return redirect()->back()
            ->with('success', 'Toparea created successfully.');
    }
    public function topareastoinvestEdit(Request $request)
    {
        $id = $request->input('id');
        $data = Toparea::find($id);
        return response()->json($data);
    }
    public function topareastoinvestUpdate(Request $request)
    {
        $toparea = Toparea::findOrFail($request->id);
        $toparea->name = $request->name;
        $toparea->link = $request->link;
        $toparea->save();
        return redirect()->back()->with('success', 'Toparea updated successfully.');
    }
    public function Lsikeywordindex(Request $request)
    {
        $lsikeyword = Lsikeyword::all();
        return view('master/Lsikeyword/lsikeyword_index', compact('lsikeyword')); 
    }
    public function SaveLsi_keyword(Request $request)
    {
        Lsikeyword::create($request->all());
        return redirect()->back()
            ->with('success', 'Lsikeyword created successfully.');   
    }
    public function Lsi_keywordEdit(Request $request)
    {
        $id = $request->input('id');
        $data = Lsikeyword::find($id);
        return response()->json($data);
    }
    public function Lsi_keywordUpdate(Request $request)
    {
        $lsikeyword = Lsikeyword::findOrFail($request->id);
        $lsikeyword->name = $request->name;
        $lsikeyword->link = $request->link;
        $lsikeyword->type = $request->type;
        $lsikeyword->save();
        return redirect()->back()->with('success', 'Lsikeyword updated successfully.');
    }
    public function Lsi_keywordDelete(Request $request, $id)
    {
        $lsikeyword = Lsikeyword::find($id);
        $lsikeyword->delete();
        return redirect()->back()->with('success', 'Lsikeyword deleted successfully.');   
    }
    public function blogcommentindex(Request $request)
    {
        $blogcomment = Blogcomment::all();
        return view('master/blogcomment/blogcomment_index', compact('blogcomment'));
    }
    public function Blog_commentEdit(Request $request)
    {
        $id = $request->input('id');
        $data = Blogcomment::find($id);
        return response()->json($data);
    }
    public function Blog_commentUpdate(Request $request)
    {
        $blogcomment = Blogcomment::findOrFail($request->id);
        $blogcomment->comment = $request->input('comment'); 
        $blogcomment->status = $request->input('status'); 
        $blogcomment->save();
        return redirect()->back()->with('success', 'Status updated successfully.');
    }
    
}
