<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogtag extends Model
{
    use HasFactory;
    public function tags()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }
}
