<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    public function set()
    {
        return $this->belongsTo(Set::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
