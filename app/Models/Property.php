<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'title', 'possession', 'description', 'area', 'price', 'country_id', 'state_id', 'city_id', 'property_type_id', 'property_status_id', 'property_view_id', 'property_size', 'address', 'short_address', 'offer', 'openspace', 'brochure', 'headingtag', 'fsi', 'investment_benifittitle', 'investment_benifitdescription', 'investment_benifitimage', 'loan','emerging_localities','top_localities','lat','lng','plot_size_to','plot_size_from','dist_id','area_id','landmark'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
    // public function state()
    // {
    //     return $this->belongsTo(State::class);
    // }

    // public function city()
    // {
    //     return $this->belongsTo(City::class);
    // }
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
   
    public function property_statuses()
    {
        return $this->belongsTo(PropertyStatus::class, 'property_status_id');
    }
    public function propertyStatus()
    {
        return $this->belongsTo(PropertyStatus::class);
    }
    public function property_view()
    {
        return $this->belongsTo(PropertyView::class);
    }
    public function propertyView()
    {
        return $this->belongsTo(PropertyView::class);
    }

    public function property_type()
    {
        return $this->belongsTo(PropertyType::class);
    }    
    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function actualimages()
    {
        return $this->hasMany(Actualimage::class);
    }
    public function layoutimages()
    {
        return $this->hasMany(Layoutimage::class);
    }
    public function property_categoryids()
    {
        return $this->hasMany(PropertyCategoryid::class);
    }
    public function propertyCategoryids()
    {
        return $this->hasMany(PropertyCategoryid::class);
    }
    
    public function property_categories()
    {
        return $this->belongsToMany(PropertyCategory::class);
    }
    public function aminityids()
    {
        return $this->hasMany(Aminityid::class);
    }
    public function scopeTopLocalities($query)
    {
        return $query->where('top_localities', 1);
    }
    public function scopeEmergingLocalities($query)
    {
        return $query->where('emerging_localities', 1);
    }
    // public function propertyenquiries()
    // {
    //     return $this->hasMany(Propertyenquiry::class);
    // }
    public function propertyenquiries()
    {
        return $this->hasMany(Propertyenquiry::class, 'property_id', 'id');
    }
    public function seos()
    {
        return $this->hasMany(Seo::class);
    }
    public function investmentbenifits()
    {
        return $this->hasMany(Investmentbenifit::class);
    }
    public function locationconnectivities()
    {
        return $this->hasMany(Locationconnectivity::class);
    }
    public function youtubes()
    {
        return $this->hasMany(Youtube::class);
    }
    public function propertyfeatures()
    {
        return $this->hasMany(Propertyfeature::class);
    }
    public function exclusive_projects()
    {
        return $this->hasMany(Exclusive_project::class);
    }
    public function newlaunchprojects()
    {
        return $this->hasMany(Newlaunchprojects::class);
    }
    public function readypossessionprojects()
    {
        return $this->hasMany(Readypossessionproject::class);
    }
}
