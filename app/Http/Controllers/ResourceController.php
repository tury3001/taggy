<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Resource;
use App\Models\Set;

class ResourceController extends Controller
{
    private static $resourcesPerPage = 15;

    /**
     * Show resources
     *
     * @return View
     */
    public function index(): View
    {
        $currentSetId = Session::get('currentSetId') ?? 1;
        $search = request()->input('search');

        if ($search) {
            $pagination = Resource::where('set_id', '=', $currentSetId)
                ->whereHas('tags', function($q) use ($search) {
                    $q->where('name', $search);
            })->orderBy('id', 'desc')->paginate(self::$resourcesPerPage);
        }  else
            $pagination = Resource::where('set_id', '=', $currentSetId)->orderBy('id', 'desc')->paginate(self::$resourcesPerPage);

        return view('resource.list', [
            'pagination' => $pagination,
            'currentSetId' => $currentSetId,
        ]);
    }

    /**
     * Show resource
     *
     * @param Resource $resource
     * @return View
     */
    public function show(Resource $resource): View
    {
        return view('resource.show', [
            'resource' => Resource::find($resource->id),
            'currentSetId' => Session::get('currentSetId') ?? 1
        ]);
    }

    /**
     * Show form to create new resource
     *
     * @return View
     * @throws \Exception
     */
    public function create(): View
    {
        return view('resource.create', [
            'currentSetId' => Session::get('currentSetId') ?? 1
        ]);
    }

    /**
     * Add new resource to the database
     *
     * @return RedirectResponse
     */
    public function store(): RedirectResponse
    {
        request()->validate([
            'set'  => ['required', 'integer'],
            'tags' => ['required', 'max:1080'],
            'file' => ['required', 'file', 'mimes:jpg,png,gif,webm,mp4,m4v', 'max:20000']
        ]);

        $resource = new Resource();
        $resource->path = request()->file('file')->store('uploads');

        $set = Set::find(request()->input('set'));
        $resource->set()->associate($set);
        $resource->save();

        $tags = explode(" ", request()->input('tags'));
        foreach ($tags as $tagText) {
            $tag = Tag::firstOrCreate(['name' => $tagText]);
            $resource->tags()->attach($tag);
        }

        return back()->with('success', 'New resource has been uploaded!');
    }

    /**
     * Edit resource form
     *
     * @param $id
     * @return View
     */
    public function edit($id): View
    {
        return view('resource.edit', [
           'resource' => Resource::find($id),
           'currentSetId' => Session::get('currentSetId') ?? 1
        ]);
    }

    /**
     * Update resource
     *
     * @return RedirectResponse
     */
    public function update(): RedirectResponse
    {
        request()->validate([
            'id'   => ['required', 'integer'],
            'set'  => ['required', 'integer'],
            'tags' => ['required', 'max:1080'],
            'file' => ['nullable', 'file', 'mimes:jpg,png,gif,webm,mp4,m4v', 'max:20000']
        ]);

        $resource = Resource::find(request()->input('id'));

        $set = Set::find(request()->input('set'));
        $resource->set()->associate($set);

        if (request()->hasFile('file')) {
            unlink(base_path() . '/storage/app/public/' . $resource->path);
            $resource->path = request()->file('file')->store('uploads');
        }

        $resource->tags()->detach();

        $tags = explode(" ", request()->input('tags'));
        foreach ($tags as $tagText) {
            $tag = Tag::firstOrCreate(['name' => $tagText]);
            $resource->tags()->attach($tag);
        }

        $resource->save();

        return back()->with('success', 'Resource has been updated!');
    }

    public function destroy()
    {
        /** @var Resource $resource */
        $resource = Resource::find(request()->resource);

        unlink(storage_path('/app/public/' . $resource->path));

        $resource->delete();

        return redirect('/')->with('success', 'Resource has been deleted!');
    }
}
