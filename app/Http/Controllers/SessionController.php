<?php

namespace App\Http\Controllers;

class SessionController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);


        if (auth()->attempt($attributes)) {
            return redirect('/')->with('success', 'Welcome back!');
        }

        return back()->withErrors(['email' => 'Your provided credentials could not be verified']);
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }
}
