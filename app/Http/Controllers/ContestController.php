<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\Event;
use Illuminate\Http\Request;

class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contests = Contest::get();
        
        return inertia('Events/Contests', [
            'contests' => $contests,
        ]);
        
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
    public function store(Request $request, Event $event) {
        $request->validate([
            'name' => 'string|required',
            'description' => 'string|required',
        ]);

        Contest::create([
            'name' => $request->name,
            'description' => $request->description,
            'event_id' => $event->id,
        ]);


        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Contest $contest)
    {
        
        $criterias = $contest->criterias;

        return inertia('Contests/Contest', [
            'contest' => $contest,
            'criterias' => $criterias,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contest $contest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contest $contest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contest $contest)
    {
        //
    }
}
