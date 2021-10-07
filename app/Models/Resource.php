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

    public function isImage()
    {
        $pathInfo = pathinfo($this->path);
        $extension = $pathInfo['extension'];

        $validImageExtensions = ['jpg', 'png', 'gif'];

        if (in_array($extension, $validImageExtensions))
            return true;
        else
            return false;
    }

    public function isVideo()
    {
        $pathInfo = pathinfo($this->path);
        $extension = $pathInfo['extension'];

        $validImageExtensions = ['webm', 'mp4', 'm4v'];

        if (in_array($extension, $validImageExtensions))
            return true;
        else
            return false;
    }

    public function getTagsString() : string
    {
        return $this->tags->map(function ($tag) {
            return $tag['name'];
        })->implode(" ");
    }
}
