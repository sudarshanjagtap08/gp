<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $fillable = ['property_id', 'metatitle', 'metadescription', 'metakeyword', 'canonical', 'schemacode'];
    use HasFactory;
}
