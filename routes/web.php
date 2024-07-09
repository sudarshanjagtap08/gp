<?php
use App\Http\Controllers\ProprtyController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\PropertytypeController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AminityController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\LeadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('website/home');
//     // return view('welcome');
// });

// Route::get('/', [WebsiteController::class, 'webindex'])->name('demowebsite');

Auth::routes();

Route::post('/save-location', [WebsiteController::class, 'saveLocation']);

Route::get('/locationwisesearch', [WebsiteController::class, 'locationwisesearch']);

Route::get('/', [WebsiteController::class, 'index'])->name('website.index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
////////////////////////////////profile///////////////////
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'getProfile'])->name('profile');
Route::post('/submit_profile', [HomeController::class, 'update_profile'])->name('submit_profile');
// Route::get('/', [WebsiteController::class, 'index']);
Route::get('/about', [WebsiteController::class, 'about']);
Route::get('/blog', [WebsiteController::class, 'blog'])->name('blog');
Route::get('/contact', [WebsiteController::class, 'contact']);
Route::post('/search-results', [WebsiteController::class, 'searchResults'])->name('search');
Route::get('/search-results', [WebsiteController::class, 'searchResults'])->name('search');
Route::get('/below-plots/{num}/{unit}', [WebsiteController::class, 'BelowPlots']);
Route::get('/plots_collection/{num}', [WebsiteController::class, 'PlotsCollection']);
// Route::get('/preoperty-details', [WebsiteController::class, 'propertyDetails']);
Route::get('/city', [WebsiteController::class, 'city']);
// Route::get('/city/{cityname}', [WebsiteController::class, 'area']);
Route::get('/area/{cityname}', [WebsiteController::class, 'area']);
Route::get('/blog-details/{blogSlug}', [WebsiteController::class, 'blogDetails'])->name('blog.details');
Route::get('/recomended_property', [WebsiteController::class, 'Recomandedproperty'])->name('recomended_property');
Route::get('/benefits-of-investing-in-a-land-genuine-plot', [WebsiteController::class, 'benefitsOfInvestingInALandGenuinePlot'])->name('benefits.of.investing.in.a.land.genuine.plot');
Route::get('/checklist-before-buying-land', [WebsiteController::class, 'ChecklistBeforeBuyingLand'])->name('checklist.before.buying.land');
Route::get('/category/{categorySlug}', [WebsiteController::class, 'blogCategoryWise']);
Route::get('/tag/{tagSlug}', [WebsiteController::class, 'blogTagWise']);
Route::get('/property/{propertySlug}', [WebsiteController::class, 'propertyDetails'])->name('property');
Route::post('blog/comment/save', [WebsiteController::class, 'BlogCommentSave']);
Route::post('blog/logincomment/save', [WebsiteController::class, 'BlogLoginCommentSave']);
// Route::post('newlaunchprojects', [WebsiteController::class, 'BlogLoginCommentSaveqqq']);

Route::get('newlaunchprojects', [WebsiteController::class, 'LaunchProject'])->name('property.newlaunchprojects');
Route::get('readypossessionprojects', [WebsiteController::class, 'ReadyPossessionProject'])->name('property.readypossessionprojects');

Route::post('/conatct/save', [LeadController::class, 'LeadSave']);

Route::get('/filter-properties', [WebsiteController::class, 'filterProperties']);
///////////////////////filter/sidebar/////////////
Route::post('/filter/sidebar', [WebsiteController::class, 'searchResultsSidebar']);
//////////////////////////city////////////////////
Route::get('/city/city-{citySlug}', [WebsiteController::class, 'CityPropertyDetails'])->name('city.city');
//////////////////////////top_localities///////////////////
Route::get('/city/top_localities-{citySlug}', [WebsiteController::class, 'TopLocalityCityPropertyDetails'])->name('city.top_localities');
///////////////////////////////emerging_localities//////////////
Route::get('/city/emerging_localities-{citySlug}', [WebsiteController::class, 'EmergingLocalityCityPropertyDetails'])->name('city.emerging_localities');
//////////////////////property-type//////////////////////
Route::get('/property-type/{propertySlug}', [WebsiteController::class, 'propertyTypes'])->name('property-type');

Route::get('/status/{propertytypeSlug}', [WebsiteController::class, 'propertyStatus'])->name('status');



Route::post('property/newenquiry/save', [WebsiteController::class, 'AddPropertyNewEnquiry']);
///////////////////////properties///////////////////////
Route::get('/properties', [ProprtyController::class, 'index'])->name('properties');
Route::get('properties/add_properties', [ProprtyController::class, 'AddProprtyy']);
// Route::get('property/addpage', [ProprtyController::class, 'Add']);
Route::post('list/property/save', [ProprtyController::class, 'SaveProprty'])->name('list.property.save');
Route::get('/properties/edit/{num}', [ProprtyController::class, 'PropertEdit']);
Route::post('/properties/update/{num}', [ProprtyController::class, 'PropertUpdate']);
/////////////////////////////property_enquiry///////////////////////////
Route::get('/property_enquiry', [ProprtyController::class, 'PropertyEnquiry'])->name('propertywise_enquiry');
Route::get('/property_enquiry/{id}', [ProprtyController::class, 'getPropertyEnquiries']);
Route::get('/propertywise_enquiry', [ProprtyController::class, 'PropertywiseEnquiry'])->name('propertywise_enquiry');
////////////////website_enquiry///////////////////////////////////////
Route::get('/website_enquiry', [ProprtyController::class, 'WebsiteEnquiry'])->name('website.enquiry');
Route::get('/edit/website_enquiry/{num}', [ProprtyController::class, 'WebsiteEnquiryEditData']);
Route::post('/website_enquiry/update/{num}', [ProprtyController::class, 'WebsiteEnquiryUpdateData']);
Route::get('/delete/website_enquiry/{num}', [ProprtyController::class, 'WebsiteEnquiryDeleteData']);
///////////////////list/enquiry//////////////////////////////////////////
Route::get('/list/enquiry/seen', [ProprtyController::class, 'SeenEnquiry'])->name('list.enquiry.seen');
Route::get('/list/enquiry', [ProprtyController::class, 'AllEnquiry'])->name('list.enquiry');
Route::get('/list/enquiry/edit/{num}', [ProprtyController::class, 'editEnquiryData'])->name('list.enquiry.edit');
Route::post('list/enquiry/update/{num}', [ProprtyController::class, 'updateEnquiryData']);
Route::get('/list/enquiry/delete/{num}', [ProprtyController::class, 'deleteEnquiryData']);
//////////////////////list/project/enquiry/////////////////////////////
Route::get('/list/project/enquiry', [ProprtyController::class, 'AllProjectNewEnquiry'])->name('list.project.enquiry');
Route::get('/list/project/enquiry/edit/{num}', [ProprtyController::class, 'editProjectNewEnquiry'])->name('list.project.enquiry.edit');
Route::post('/list/project/enquiry/update/{num}', [ProprtyController::class, 'UpdateProjectNewEnquiry'])->name('list.project.enquiry.update');
///////////////////////////list.other.lead//////////////////////////////
Route::get('list.other.lead', [LeadController::class, 'OtherLead'])->name('list.other.lead');
Route::get('list.other.lead.add', [LeadController::class, 'OtherLeadAdd'])->name('list.other.lead.add');
Route::post('list.other.lead.save', [LeadController::class, 'OtherLeadSave'])->name('list.other.lead.save');
Route::get('list/other/lead/edit/{num}', [LeadController::class, 'OtherLeadEdit']);
Route::post('list/other/lead/update/{num}', [LeadController::class, 'OtherLeadUpdate']);
Route::get('list/other/lead/delete/{num}', [LeadController::class, 'deleteOtherLeadData']);


//////////////////////list/blog/////////////////////////////
Route::get('/list/blog', [BlogController::class, 'index'])->name('list.blog');
Route::get('list/blog/add', [BlogController::class, 'AddBlog']);
Route::post('list/blog/save', [BlogController::class, 'SaveBlog'])->name('list.blog.save');
Route::post('list/blog/saveimage', [BlogController::class, 'saveFile']);
Route::get('/list/blog/edit/{num}', [BlogController::class, 'BlogEdit']);
Route::post('list/blog/update', [BlogController::class, 'UpdateBlog'])->name('list.blog.update');
//////////////////////////////types_of_land///////////////////////
Route::get('/types_of_land', [PropertytypeController::class, 'index'])->name('types_of_land');
Route::get('types_of_land/add_type_of_land', [PropertytypeController::class, 'AddPropertyType']);
Route::post('types_of_land/save_type_of_land', [PropertytypeController::class, 'SavePropertyType']);
Route::get('types_of_land/edit_type_of_land/{num}', [PropertytypeController::class, 'EditPropertyType']);
Route::post('types_of_land/update_type_of_land/{num}', [PropertytypeController::class, 'UpdatePropertyType']);
/////////////////////////property_categories/////////////////
Route::get('/property_categories', [PropertytypeController::class, 'property_categorycrudindex']);
Route::post('property_category/save', [PropertytypeController::class, 'SavePropertyCategory']);
Route::post('property_category/edit', [PropertytypeController::class, 'CategoryEdit'])->name('property_category.edit');
Route::post('property_category/update', [PropertytypeController::class, 'CategoryUpdate'])->name('property_category.update');
/////////////////////list/about///////////////////////////
Route::get('/list/about', [AboutController::class, 'aboutus'])->name('aboutus');
Route::post('/aboutus/save', [AboutController::class, 'Saveaboutus']);
Route::get('aboutus/edit/{num}', [AboutController::class, 'aboutusEdit'])->name('about.edit');
Route::post('aboutus/update', [AboutController::class, 'aboutusUpdate'])->name('about.update');
/////////////////////disclaimer//////////////////////////
Route::get('/disclaimer', [AboutController::class, 'disclaimer']);
Route::post('/disclaimer/save', [AboutController::class, 'Savedisclaimer']);
Route::post('disclaimer/edit', [AboutController::class, 'disclaimerEdit'])->name('disclaimer.edit');
Route::post('disclaimer/update', [AboutController::class, 'disclaimerUpdate'])->name('disclaimer.update');
/////////////////////checklist////////////////////////////
Route::get('/checklist', [ChecklistController::class, 'checklist_index']);
Route::post('/checklist/save', [ChecklistController::class, 'Savechecklist']);
Route::post('checklist/edit', [ChecklistController::class, 'ChecklistEdit'])->name('checklist.edit');
Route::post('checklist/update', [ChecklistController::class, 'ChecklistUpdate'])->name('checklist.update');
///////////////////////////////benefits/////////////////////
Route::get('/benefits', [BenefitController::class, 'benefit_index']);
Route::post('benifit/save', [BenefitController::class, 'Savebenefit']);
Route::post('benifit/edit', [BenefitController::class, 'BenefitsEdit'])->name('benifit.edit');
Route::post('benifit/update', [BenefitController::class, 'BenefitsUpdate'])->name('benifit.update');
/////////////////////////////////what_do_we_do////////////////////////////
Route::get('/what_do_we_do', [BenefitController::class, 'what_do_we_do_index']);
Route::post('what_do_we_do/save', [BenefitController::class, 'SaveWhatDoWeDo']);
Route::post('what_do_we_do/edit', [BenefitController::class, 'WhatDoWeDoEdit'])->name('what_do_we_do.edit');
Route::post('what_do_we_do/update', [BenefitController::class, 'WhatDoWeDoUpdate'])->name('what_do_we_do.update');
/////////////////////////////////key_services////////////////////////////
Route::get('/key_services', [BenefitController::class, 'key_services_index']);
Route::post('key_service/save', [BenefitController::class, 'SaveKeyServices']);
Route::post('key_service/edit', [BenefitController::class, 'KeyServicesEdit'])->name('key_service.edit');
Route::post('key_services/update', [BenefitController::class, 'KeyServicesUpdate'])->name('key_service.update');
////////////////////////country/////////////////////////////
Route::get('/country', [DropdownController::class, 'index']);
Route::post('country/store', [DropdownController::class, 'CountryStore'])->name('country.store');
Route::post('country/edit', [DropdownController::class, 'CountryEdit'])->name('countries.edit');
Route::post('country/update', [DropdownController::class, 'CountryUpdate'])->name('countries.update');

Route::post('state/store', [DropdownController::class, 'StateStore'])->name('state.store');
Route::post('state/edit', [DropdownController::class, 'StateEdit'])->name('states.edit');
Route::post('state/update', [DropdownController::class, 'StateUpdate'])->name('states.update');

Route::post('dist/store', [DropdownController::class, 'DistStore'])->name('dist.store');
Route::post('district/edit', [DropdownController::class, 'DistEdit'])->name('district.edit');
Route::post('dist/update', [DropdownController::class, 'DistUpdate'])->name('dist.update');

Route::post('city/store', [DropdownController::class, 'CityStore'])->name('city.store');
Route::post('city/edit', [DropdownController::class, 'CityEdit'])->name('cities.edit');
Route::post('city/update', [DropdownController::class, 'CityUpdate'])->name('city.update');

Route::post('area/store', [DropdownController::class, 'AreaStore'])->name('area.store');
Route::post('area/edit', [DropdownController::class, 'AreaEdit'])->name('area.edit');
Route::post('area/update', [DropdownController::class, 'AreaUpdate'])->name('area.update');

Route::get('get-states}', [DropdownController::class, 'getStates'])->name('get.states');
Route::get('get-district', [DropdownController::class, 'getDistrict'])->name('get.district');
Route::get('get-cities', [DropdownController::class, 'getCities'])->name('get.cities');
Route::get('get-areas', [DropdownController::class, 'getAreas'])->name('get.areas');

/////////////////////pincode//////////////////
Route::get('/pincode', [DropdownController::class, 'pincode']);
////////////////////add-to-favorites//////////////////////
Route::post('/add-to-favorites', [FavoriteController::class, 'addToFavorites']);
//////////////////////shortlist//////////////////
Route::get('/shortlist', [WebsiteController::class, 'Shortlist'])->name('shortlist');
Route::get('/shortlisted_properties', [ChecklistController::class, 'ShortlistPropertyindex'])->name('shortlistpropertyindex');
/////////////////////////property/enquiry/save//////////////
Route::post('property/enquiry/save', [ProprtyController::class, 'AddPropertyEnquiry']);
//////////////////////////contacted_property//////////
Route::get('/contacted_property', [WebsiteController::class, 'ContactedProperty'])->name('contacted_property');


Route::get('/contacted_properties', [ChecklistController::class, 'ContactedPropertyindex']);
Route::get('/viewed_properties', [ChecklistController::class, 'ViewedPropertyindex']);


Route::get('/viewed_property', [WebsiteController::class, 'ViewedProperty'])->name('viewed_property');

Route::get('/similar_property', [WebsiteController::class, 'SimilarProperty'])->name('similar_property');
//////////////////////properties/seo////////////
Route::get('properties/seo/{num}', [ProprtyController::class, 'SEOProperty']);
Route::post('properties/seo/save', [ProprtyController::class, 'SEOSave']);
//////////////////////blog/seo////////////
Route::get('blog/seo/{num}', [BlogController::class, 'SEOBlog']);
Route::post('blog/seo/save', [BlogController::class, 'SEOBlogSave']);
/////////////////////aminities/////////////////////////
Route::get('/aminities', [AminityController::class, 'index']);
Route::post('/aminity/save', [AminityController::class, 'Saveaminity']);
Route::post('aminities/edit', [AminityController::class, 'aminityEdit'])->name('aminity.edit');
Route::post('aminities/update', [AminityController::class, 'aminityUpdate'])->name('aminity.update');
/////////////////////////list/landingpage////////////////////
Route::get('list/landingpage', [LandingpageController::class, 'index'])->name('landingpage');
Route::get('list/landingpage/add', [LandingpageController::class, 'AddLandingpage']);
Route::post('list/landingpage/save', [LandingpageController::class, 'SaveLandingpage']);
Route::get('list/landingpage/{num}', [LandingpageController::class, 'EditLanding']);
Route::get('list/landingpage/godrej', [LandingpageController::class, 'landingpage']);
/////////////////////list/register/buyer/////////////////
Route::get('list/register/{value}', [ReportController::class, 'userList'])->name('user.list');
Route::get('list/all/user', [ReportController::class, 'UserAllList'])->name('list.all.user');
Route::get('list/all/buyer', [ReportController::class, 'buyerindex'])->name('buyerindex');
Route::get('/list/shortlistedproperty/{num}/{name}', [ReportController::class, 'shortlistedlistbuyerwise']);
Route::get('/list/seenproperty/{num}/{name}', [ReportController::class, 'seenpropertylistbuyerwise']);
Route::get('/list/enquiryproperty/{num}/{name}', [ReportController::class, 'enquirypropertylistbuyerwise']);
////////////////////list/all/propertywisedetails////////
Route::get('list/all/propertywisedetails', [ReportController::class, 'propertyindex']);
Route::get('list/propertywise/shortlistedproperty/{num}/{name}', [ReportController::class, 'shortlistedlistpropertywise']);
Route::get('list/propertywise/seenproperty/{num}/{name}', [ReportController::class, 'seenlistedlistpropertywise']);
Route::get('list/propertywise/enquiryproperty/{num}/{name}', [ReportController::class, 'enquirylistedlistpropertywise']);
/////////////////////registeruserinfo/////////////
Route::post('registeruserinfo', [LandingpageController::class, 'SaveRegisterinfo'])->name('registeruserinfo');
Route::get('list/registeruserinfo', [LandingpageController::class, 'ListRegisterinfo']);

/////////////////////////////list/exclusive_projects///////////////////
Route::get('list/exclusive_projects', [AboutController::class, 'exclusive_project_index']);
Route::post('/exclusive_project/edit', [AboutController::class, 'exclusive_project_edit'])->name('exclusive_project.edit');
Route::post('/exclusive_project/update', [AboutController::class, 'exclusive_project_update'])->name('exclusive_project.update');
//////////////////////////////////////////list/new_launch_projects/////////////////////////
Route::get('list/new_launch_projects', [AboutController::class, 'new_launch_projects_index']);
Route::post('/new_launch_projects/edit', [AboutController::class, 'newlaunch_project_edit'])->name('newlaunch_project.edit');
Route::post('/new_launch_projects/update', [AboutController::class, 'new_launch_project_update'])->name('new_launch_project.update');
Route::post('/new_launch_projects/add', [AboutController::class, 'new_launch_project_add'])->name('new_launch_project.add');
////////////////////////////////////////ready_possession_project////////////
Route::post('/ready_possession_projects/add', [AboutController::class, 'ready_possession_project_add'])->name('ready_possession_project.add');
Route::post('/ready_possession_projects/edit', [AboutController::class, 'readypossession_project_edit'])->name('readypossession_project.edit');
Route::post('/readypossession_projects/update', [AboutController::class, 'readypossession_project_update'])->name('ready_possession_projects.update');

/////////////////////subscribe////////////////
Route::post('/subscribe', [WebsiteController::class, 'SubscribedataSave'])->name('subscribe');
Route::get('/list/subscription', [AboutController::class, 'SubscribedataIndex'])->name('subscribe.index');
Route::get('/list/subscribe/edit/{num}', [AboutController::class, 'SubscribeEditData']);
Route::post('list/subscription/update/{num}', [AboutController::class, 'updateSubscribeData']);
Route::get('/list/subscribe/delete/{num}', [AboutController::class, 'SubscribeDeleteData']);
///////////////////popup.enquiry//////////////////
Route::post('/popup/enquiry', [WebsiteController::class, 'EnquirepopdataSave'])->name('popup.enquiry');
Route::get('/list/popup/enquiry', [AboutController::class, 'EnquirepopdataIndex'])->name('popup.enquiry.index');
///////////////////user.edit/////////////
Route::get('/user_edit/{id}', [ReportController::class, 'UserEdit'])->name('user.edit');
Route::get('/user/delete/{id}', [ReportController::class, 'UserDelete'])->name('user.delete');
Route::post('/user/update', [ReportController::class, 'UserUpdate'])->name('user.update');
Route::post('/update-user-status', [ReportController::class, 'updateUserStatus']);
Route::post('/user/status/update', [ReportController::class, 'updateUserStatusById']);
Route::get('/user_login_history/{id}', [ReportController::class, 'getUserLoginHis']);
//////////////////////popup/image//////////////////////////
Route::get('/popup/image', [ReportController::class, 'PopUpindex']);
Route::post('popup/edit', [ReportController::class, 'PopupEdit'])->name('popup.edit');
Route::post('popup/update', [ReportController::class, 'PopupUpdate'])->name('popup.update');
//////////////////////list/requirement//////////////////////////////////
Route::get('list/requirement', [AboutController::class, 'requirement_index']);
Route::post('list/requirement/add', [AboutController::class, 'requirement_add']);
Route::post('/list/subscribe/edit/', [AboutController::class, 'requirementEditData'])->name('requirement.edit');
Route::post('/list/requirement/update', [AboutController::class, 'updateRequirement'])->name('requirement.update');
///////////////////////////top_areas_to_invest//////////////////////////////
Route::get('/top_areas_to_invest', [AboutController::class, 'topareastoinvest']);
Route::post('/topareastoinvest/save', [AboutController::class, 'Savetopareastoinvest']);
Route::post('topareastoinvest/edit', [AboutController::class, 'topareastoinvestEdit'])->name('topareastoinvest.edit');
Route::post('topareastoinvest/update', [AboutController::class, 'topareastoinvestUpdate'])->name('topareastoinvest.update');
////////////////////////////////////////list/lsi_keyword//////////////////////
Route::get('/list/lsi_keyword', [AboutController::class, 'Lsikeywordindex']);
Route::post('/lsi_keyword/save', [AboutController::class, 'SaveLsi_keyword']);
Route::post('lsi_keyword/edit', [AboutController::class, 'Lsi_keywordEdit'])->name('lsi_keyword.edit');
Route::post('lsi_keyword/update', [AboutController::class, 'Lsi_keywordUpdate'])->name('lsi_keyword.update');
Route::get('lsi_keyword/delete/{num}', [AboutController::class, 'Lsi_keywordDelete']);
///////////////////////blog/comments///////////////
Route::get('/blog/comments', [AboutController::class, 'blogcommentindex']);
Route::post('blog_comment/edit', [AboutController::class, 'Blog_commentEdit'])->name('blog_comment.edit');
Route::post('blogcomment/update', [AboutController::class, 'Blog_commentUpdate'])->name('blog_comment.update');
////////////////////////////////property/view/////////////////////////////////////
Route::get('list/property_view', [ProprtyController::class, 'property_viewindex'])->name('list.property_view');
Route::get('/properties/view/edit/{num}', [ProprtyController::class, 'PropertViewEdit']);
Route::post('/properties/view/update/{num}', [ProprtyController::class, 'PropertviewUpdate']);

Route::post('/update-property-status', [ProprtyController::class, 'updatePropertyStatus']);
