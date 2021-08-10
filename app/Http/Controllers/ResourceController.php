<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Resource;
use App\Models\Set;

class ResourceController extends Controller
{
    private static $resourcesPerPage = 16;

    public function index(Request $request)
    {
        $currentSet = Session::get('currentSet') ?? 1;
        $search = $request->input('search');

        if ($search) {
            $pagination = Resource::whereHas('tags', function($q) use ($search) {
                $q->where('name', $search);
            })->paginate(self::$resourcesPerPage);
        }  else
            $pagination = Resource::paginate(self::$resourcesPerPage);

        return view('main', [
            'pagination' => $pagination,
            'sets' => Set::all(),
            'currentSet' => $currentSet
        ]);
    }
}
