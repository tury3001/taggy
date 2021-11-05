<?php

namespace App\Http\Controllers;

use App\Models\Set;
use App\Models\Tag;
use Illuminate\Support\Facades\Session;

class TagController extends Controller
{
    public function index()
    {
        $currentSetId = Session::get('currentSetId') ?? 1;

        $tags = Tag::whereHas('resources', function ($query) use ($currentSetId) {
            $query->where('set_id', '=', $currentSetId);
        })->get();

        return view('tag.list', [
            'tags' => $tags,
            'currentSetId' => $currentSetId,
            'currentSet' => Set::find($currentSetId)
        ]);
    }
}
