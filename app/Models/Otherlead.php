<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otherlead extends Model
{
    use HasFactory;
    protected $fillable = ['name','mobilenumber','email','comment'];
    public function otherleadhistories()
    {
        return $this->hasMany(Otherleadhistory::class, 'otherlead_id');
    }
}
