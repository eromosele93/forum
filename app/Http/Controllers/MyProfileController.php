<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class MyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        return view('profile.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->file('photo')->getClientOriginalName();
        $request->file('photo')->storeAs('public/images', $name);

        auth()->user()->profile()->create([
            'name' => $name,
        ]);

        return redirect()->route('profile.index')->with('success', 'Profile Photo Uploaded Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $user)
    {
        $name = $request->file('photo')->getClientOriginalName();
        $request->file('photo')->storeAs('public/images', $name);
        auth()->user()->profile()->update([
            'name' => $name
        ]);

        return redirect()->route('profile.index')->with('success', 'Profile Photo Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
