<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyCategoryid extends Model
{
    use HasFactory;
    public function property_categories()
    {
        return $this->belongsTo(PropertyCategory::class, 'property_category_id');
    }
}
