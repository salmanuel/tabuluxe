<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\Round;
use Illuminate\Http\Request;

class RoundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, Contest $contest)
    {   
        
        $request->validate([
            'rounds' => 'required|numeric',
        ]);

        $judge = Round::create([
            'rounds' => $request->rounds,
            'contest_id' => $contest->id,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Round $round)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Round $round)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Round $round)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Round $round)
    {
        //
    }
}
