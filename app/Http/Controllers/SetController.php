<?php

namespace App\Http\Controllers;

use App\Models\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SetController extends Controller
{
    public function index()
    {
        return view('set.list', [
            'currentSetId' => Session::get('currentSetId') ?? 1
        ]);
    }

    public function edit(int $id)
    {
        return view('set.edit', [
            'currentSetId' => Session::get('currentSetId') ?? 1,
            'set' => Set::find($id)
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => ['required', 'integer'],
            'name' => ['required', 'max:255', 'unique:sets']
        ]);

        $set = Set::find($request->input('id'));
        $set->name = $request->input('name');

        $set->save();

        return back()->with('success', 'Set has been updated!');
    }

    public function create()
    {
        return view('set.addSetForm', [
            'currentSetId' => Session::get('currentSetId') ?? 1,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
           'name' => ['required', 'max:255', 'unique:sets']
        ]);

        $set = new Set();
        $set->name = $request->input('name');
        $set->save();

        return back()->with('success', 'Set has been added.');
    }
}
