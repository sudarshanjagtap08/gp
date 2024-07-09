<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;
    public function websiteenquiryhistories()
    {
        return $this->hasMany(Websiteenquiryhistory::class, 'enquiry_id');
    }
}
