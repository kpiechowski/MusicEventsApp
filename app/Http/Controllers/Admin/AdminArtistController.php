<?php

namespace App\Http\Controllers\Admin;

use App\Models\Artist;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArtistStoreRequest;

class AdminArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.artists.index', ['artists' => Artist::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.artists.create_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArtistStoreRequest $request)
    {
        //
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['name'], '-');

        $artist = Artist::create($validated);
        $artist->handleProfileAvatar($request->file('profile_avatar'));

        return redirect()->route('admin.artists.index')->with('message', 'Artist has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artist $artist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artist $artist)
    {
        //
        return view('admin.artists.edit_form', ['artist' => $artist]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $artist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist)
    {
        //
    }
}
