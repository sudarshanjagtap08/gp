<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['dist_id' , 'name'];
    public function dist()
    {
        return $this->belongsTo(District::class);
    }
    public function properties()
    {
        return $this->hasMany(Property::class, 'city_id');
    }
    
}
