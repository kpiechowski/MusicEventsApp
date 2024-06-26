<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MusicEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AdminEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd('elo');
        return view('admin.events.index', ['events' => MusicEvent::orderBy('start_date', 'asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.events.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MusicEvent $musicEvent)
    {
        //
        // dd($musicEvent);
        return view('admin.events.show', ['musicEvent' => $musicEvent]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MusicEvent $musicEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MusicEvent $musicEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MusicEvent $musicEvent)
    {
        //
    }
}
