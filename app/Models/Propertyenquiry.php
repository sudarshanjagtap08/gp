<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propertyenquiry extends Model
{
    use HasFactory;
     protected $fillable = ['property_id', 'user_id', 'name', 'mobilenumber', 'email', 'notification'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    public function enquiryhistories()
    {
        return $this->hasMany(Enquiryhistory::class, 'enquiry_id');
    }
}
