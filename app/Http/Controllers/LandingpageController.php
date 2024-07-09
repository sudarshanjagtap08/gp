<?php

namespace App\Http\Controllers;
use App\Models\Landingpage;
use App\Models\Features;
use App\Models\Gallery;
use App\Models\Overview;
use App\Models\SliderSection;
use App\Models\Plan;
use App\Models\Video;
use App\Models\Location;
use App\Models\Activeimage;
use App\Models\Registeruserdata;


use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index()
    {
        $landingpage = Landingpage::all();
        return view('list/landingpage/index', compact('landingpage')); 
    }
    public function AddLandingpage(Request $request)
    {
        return view('list/landingpage/landingpageadd'); 
    }
    public function SaveLandingpage(Request $request)
    {
        $landingpage = new Landingpage();
        $landingpage->about_title = $request->input('abouttitle');
        $landingpage->about_image = $request->input('aboutimage');
        $landingpage->about_description = $request->input('aboutdescription');
        $landingpage->cta_title = $request->input('ctatitle');
        $landingpage->cta_image = $request->input('ctaimage');
        $landingpage->cta_description = $request->input('ctadescription');
        $landingpage->contact_number = $request->input('contact_number');
        $landingpage->contact_email = $request->input('contact_email');
        $landingpage->contact_address = $request->input('contact_address');
        $landingpage->landing_page_title = $request->input('landing_page_title');
        $landingpage->landing_page_template = $request->input('landing_page_template');
        $landingpage->save();    
        $lastInsertedId = $landingpage->id;          
        $feature = new Features();
        $feature->landingpage_id = $lastInsertedId;
        $feature->featuretitleone = $request->input('featuretitleone');
        $feature->featuredescriptionone = $request->input('featuredescriptionone');
        $feature->featuretitletwo = $request->input('featuretitletwo');
        $feature->featuredescriptiontwo = $request->input('featuredescriptiontwo');
        $feature->featuretitlethree = $request->input('featuretitlethree');
        $feature->featuredescriptionthree = $request->input('featuredescriptionthree');
        $feature->featuretitlefour = $request->input('featuretitlefour');
        $feature->featuredescriptionfour = $request->input('featuredescriptionfour');
        if (request()->hasFile('featureimageone')){
            $featureimageone = $request->file('featureimageone');
            $fileName = $featureimageone->getClientOriginalName();
            $feature->featureimageone = $fileName;
            $featureimageone->storeAs('images', $fileName, 'public');
        }
        if (request()->hasFile('featureimagetwo')){
            $featureimagetwo = $request->file('featureimagetwo');
            $fileName = $featureimagetwo->getClientOriginalName();
            $feature->featureimagetwo = $fileName;
            $featureimagetwo->storeAs('images', $fileName, 'public');
        }
        if (request()->hasFile('featureimagethree')){
            $featureimagethree = $request->file('featureimagethree');
            $fileName = $featureimagethree->getClientOriginalName();
            $feature->featureimagethree = $fileName;
            $featureimagethree->storeAs('images', $fileName, 'public');
        }
        if (request()->hasFile('featureimagefour')){
            $featureimagefour = $request->file('featureimagefour');
            $fileName = $featureimagefour->getClientOriginalName();
            $feature->featureimagefour = $fileName;
            $featureimagefour->storeAs('images', $fileName, 'public');
        }
        $feature->save();        
        $overview = new Overview();
        $overview->landingpage_id = $lastInsertedId;
        $overview->overviewtitleone = $request->input('overviewtitleone');
        $overview->overviewdescriptionone = $request->input('overviewdescriptionone');
        $overview->overviewtitletwo = $request->input('overviewtitletwo');
        $overview->overviewdescriptiontwo = $request->input('overviewdescriptiontwo');
        $overview->overviewtitlethree = $request->input('overviewtitlethree');
        $overview->overviewdescriptionthree = $request->input('overviewdescriptionthree');
        $overview->overviewtitlefour = $request->input('overviewtitlefour');
        $overview->overviewdescriptionfour = $request->input('overviewdescriptionfour');
        if (request()->hasFile('overviewimageone')){
            $overviewimageone = $request->file('overviewimageone');
            $fileName = $overviewimageone->getClientOriginalName();
            $overview->overviewimageone = $fileName;
            $overviewimageone->storeAs('images', $fileName, 'public');
        }
        if (request()->hasFile('overviewimagetwo')){
            $overviewimagetwo = $request->file('overviewimagetwo');
            $fileName = $overviewimagetwo->getClientOriginalName();
            $overview->overviewimagetwo = $fileName;
            $overviewimagetwo->storeAs('images', $fileName, 'public');
        }
        if (request()->hasFile('overviewimagethree')){
            $overviewimagethree = $request->file('overviewimagethree');
            $fileName = $overviewimagethree->getClientOriginalName();
            $overview->overviewimagethree = $fileName;
            $overviewimagethree->storeAs('images', $fileName, 'public');
        }
        if (request()->hasFile('overviewimagefour')){
            $overviewimagefour = $request->file('overviewimagefour');
            $fileName = $overviewimagefour->getClientOriginalName();
            $overview->overviewimagefour = $fileName;
            $overviewimagefour->storeAs('images', $fileName, 'public');
        }
        $feature->save();
        $overview = new SliderSection();
        $overview->landingpage_id = $lastInsertedId;
        $overview->slidertitleone = $request->input('slidertitleone');
        $overview->slidersubtitleone = $request->input('slidersubtitleone');
        $overview->slidershortdescriptionone = $request->input('slidershortdescriptionone');
        $overview->slidertitletwo = $request->input('slidertitletwo');
        $overview->slidersubtitletwo = $request->input('slidersubtitletwo');
        $overview->slidershortdescriptiontwo = $request->input('slidershortdescriptiontwo');
        $overview->slidertitlethree = $request->input('slidertitlethree');
        $overview->slidersubtitlethree = $request->input('slidersubtitlethree');
        $overview->slidershortdescriptionthree = $request->input('slidershortdescriptionthree');
        $overview->slidertitlefour = $request->input('slidertitlefour');
        $overview->slidersubtitlefour = $request->input('slidersubtitlefour');
        $overview->slidershortdescriptionfour = $request->input('slidershortdescriptionfour');
        if (request()->hasFile('sliderimageone')){
            $sliderimageone = $request->file('sliderimageone');
            $fileName = $sliderimageone->getClientOriginalName();
            $overview->sliderimageone = $fileName;
            $sliderimageone->storeAs('images', $fileName, 'public');
        }
        if (request()->hasFile('sliderimagetwo')){
            $sliderimagetwo = $request->file('sliderimagetwo');
            $fileName = $sliderimagetwo->getClientOriginalName();
            $overview->sliderimagetwo = $fileName;
            $sliderimagetwo->storeAs('images', $fileName, 'public');
        }
        if (request()->hasFile('sliderimagethree')){
            $sliderimagethree = $request->file('sliderimagethree');
            $fileName = $sliderimagethree->getClientOriginalName();
            $overview->sliderimagethree = $fileName;
            $sliderimagethree->storeAs('images', $fileName, 'public');
        }
        if (request()->hasFile('sliderimagefour')){
            $sliderimagefour = $request->file('sliderimagefour');
            $fileName = $sliderimagefour->getClientOriginalName();
            $overview->sliderimagefour = $fileName;
            $sliderimagefour->storeAs('images', $fileName, 'public');
        }
        $overview->save();
        $plan = new Plan();
        $plan->landingpage_id = $lastInsertedId;
        $plan->plantitleone = $request->input('plantitleone');
        $plan->plansubtitleone = $request->input('plansubtitleone');
        $plan->plantitletwo = $request->input('plantitletwo');
        $plan->plansubtitletwo = $request->input('plansubtitletwo');
        $plan->plantitlethree = $request->input('plantitlethree');
        $plan->plansubtitlethree = $request->input('plansubtitlethree');
        $plan->plantitlefour = $request->input('plantitlefour');
        $plan->plansubtitlefour = $request->input('plansubtitlefour');
        if (request()->hasFile('planimageone')){
            $planimageone = $request->file('planimageone');
            $fileName = $planimageone->getClientOriginalName();
            $plan->planimageone = $fileName;
            $planimageone->storeAs('images', $fileName, 'public');
        }
        if (request()->hasFile('planimagetwo')){
            $planimagetwo = $request->file('planimagetwo');
            $fileName = $planimagetwo->getClientOriginalName();
            $plan->planimagetwo = $fileName;
            $planimagetwo->storeAs('images', $fileName, 'public');
        }
        if (request()->hasFile('planimagethree')){
            $planimagethree = $request->file('planimagethree');
            $fileName = $planimagethree->getClientOriginalName();
            $plan->planimagethree = $fileName;
            $planimagethree->storeAs('images', $fileName, 'public');
        }
        if (request()->hasFile('planimagefour')){
            $planimagefour = $request->file('planimagefour');
            $fileName = $planimagefour->getClientOriginalName();
            $plan->planimagefour = $fileName;
            $planimagefour->storeAs('images', $fileName, 'public');
        }
        $plan->save();
        $video = new Video();
        $video->landingpage_id = $lastInsertedId;
        $video->videotitleone = $request->input('videotitleone');
        $video->videosubtitleone = $request->input('videosubtitleone');
        $video->videotitletwo = $request->input('videotitletwo');
        $video->videosubtitletwo = $request->input('videosubtitletwo');
        $video->videotitlethree = $request->input('videotitlethree');
        $video->videosubtitlethree = $request->input('videosubtitlethree');
        $video->videotitlefour = $request->input('videotitlefour');
        $video->videosubtitlefour = $request->input('videosubtitlefour');
        if (request()->hasFile('videoone')){
            $videoone = $request->file('videoone');
            $fileName = $videoone->getClientOriginalName();
            $video->videoone = $fileName;
            $videoone->storeAs('images', $fileName, 'public');
        }
        if (request()->hasFile('videotwo')){
            $videotwo = $request->file('videotwo');
            $fileName = $videotwo->getClientOriginalName();
            $video->videotwo = $fileName;
            $videotwo->storeAs('images', $fileName, 'public');
        }
        if (request()->hasFile('videothree')){
            $videothree = $request->file('videothree');
            $fileName = $videothree->getClientOriginalName();
            $video->videothree = $fileName;
            $videothree->storeAs('images', $fileName, 'public');
        }
        if (request()->hasFile('videofour')){
            $videofour = $request->file('videofour');
            $fileName = $videofour->getClientOriginalName();
            $video->videofour = $fileName;
            $videofour->storeAs('images', $fileName, 'public');
        }
        $video->save();
        $activeimage = new Activeimage();
        $activeimage->landingpage_id = $lastInsertedId;
        $activeimage->activetitleone = $request->input('activetitleone');
        $activeimage->activesubtitleone = $request->input('activesubtitleone');
        $activeimage->activetitletwo = $request->input('activetitletwo');
        $activeimage->activesubtitletwo = $request->input('activesubtitletwo');
        $activeimage->activetitlethree = $request->input('activetitlethree');
        $activeimage->activesubtitlethree = $request->input('activesubtitlethree');
        $activeimage->activetitlefour = $request->input('activetitlefour');
        $activeimage->activesubtitlefour = $request->input('activesubtitlefour');
        if (request()->hasFile('activeimageone')){
            $activeimageone = $request->file('activeimageone');
            $fileName = $activeimageone->getClientOriginalName();
            $activeimage->activeimageone = $fileName;
            $activeimageone->storeAs('images', $fileName, 'public');
        }
        if (request()->hasFile('activeimagetwo')){
            $activeimagetwo = $request->file('activeimagetwo');
            $fileName = $activeimagetwo->getClientOriginalName();
            $activeimage->activeimagetwo = $fileName;
            $activeimagetwo->storeAs('images', $fileName, 'public');
        }
        if (request()->hasFile('activeimagethree')){
            $activeimagethree = $request->file('activeimagethree');
            $fileName = $activeimagethree->getClientOriginalName();
            $activeimage->activeimagethree = $fileName;
            $activeimagethree->storeAs('images', $fileName, 'public');
        }
        if (request()->hasFile('activeimagefour')){
            $activeimagefour = $request->file('activeimagefour');
            $fileName = $activeimagefour->getClientOriginalName();
            $activeimage->activeimagefour = $fileName;
            $activeimagefour->storeAs('images', $fileName, 'public');
        }
        $activeimage->save();
        $location = new Location();
        $location->landingpage_id = $lastInsertedId;
        $location->locationtitleone = $request->input('locationtitleone');
        $location->locationssubtitleone = $request->input('locationssubtitleone');
        $location->locationtitletwo = $request->input('locationtitletwo');
        $location->locationssubtitletwo = $request->input('locationssubtitletwo');
        $location->locationtitlethree = $request->input('locationtitlethree');
        $location->locationssubtitlethree = $request->input('locationssubtitlethree');
        $location->locationtitlefour = $request->input('locationtitlefour');
        $location->locationssubtitlefour = $request->input('locationssubtitlefour');       
        $location->save();
        $galleryData = [];
        $landingpage_id = $lastInsertedId;
            for ($i = 0; $i < $request->input('imageCount'); $i++) {
                $image = $request->file('galleryimage')[$i];
                $title = $request->input('gallerytitle')[$i];
                $subtitle = $request->input('gallerysubtitle')[$i];
                if ($image){
                    $galleryimage = $request->file('galleryimage');
                    $fileName = $galleryimage->getClientOriginalName();
                    $activeimage->galleryimage = $fileName;
                    $galleryimage->storeAs('images', $fileName, 'public');
                }
                $galleryData[] = [
                    'landingpage_id' => $landingpage_id,
                    'galleryimage' => $imagePath,
                    'gallerytitle' => $title,
                    'gallerysubtitle' => $subtitle,
                ];
            }
        Gallery::insert($galleryData);
        return redirect()->route('landingpage');
    }
    public function EditLanding(Request $request, $id)
    {
        $landingpagedata = Landingpage::with('locations')->find($id);
        return view('list/landingpage/landingpageedit',compact('landingpagedata')); 
    }
    public function landingpage()
    {
        return view('list/landingpage/landingpageindex'); 
    }
    public function SaveRegisterinfo(Request $request)
    {
        $registeruserdata = new Registeruserdata();
        $registeruserdata->name = $request->input('name');
        $registeruserdata->email = $request->input('email');
        $registeruserdata->mobilenumber = $request->input('mobilenumber');
        $registeruserdata->remark = $request->input('remark'); 
        $registeruserdata->registeras = $request->input('registeras');
        $registeruserdata->save();
         return redirect()->route('demowebsite');
    }
    public function ListRegisterinfo()
    {
        $registeruserinfos = Registeruserdata::all();
        return view('list/user/listregisteruserinfo', compact('registeruserinfos')); 
    }
}
