<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function blogcategories()
    {
        return $this->hasMany(Blogcategory::class);
    }
    public function blogtags()
    {
        return $this->hasMany(Blogtag::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function blogseos()
    {
        return $this->hasMany(Blogseo::class);
    }
     
}
