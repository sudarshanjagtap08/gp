<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aminityid extends Model
{
    use HasFactory;
    public function aminitys()
    {
        return $this->belongsTo(Aminity::class, 'aminity_id');
    }

}
