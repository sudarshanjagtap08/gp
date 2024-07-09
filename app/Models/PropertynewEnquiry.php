<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertynewEnquiry extends Model
{
    use HasFactory;
    public function properties()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

}
