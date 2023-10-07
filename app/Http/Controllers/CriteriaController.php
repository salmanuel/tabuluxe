<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\Criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
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
    public function store(Request $request, Contest $contest) {
        $request->validate([
            'criteria' => 'string|required',
            'description' => 'string|required',
            'weight' => 'numeric|required',
        ]);

        Criteria::create([
            'criteria' => $request->criteria,
            'description' => $request->description,
            'weight' => $request->weight,
            'contest_id' => $contest->id,
        ]);


        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Criteria $criteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Criteria $criteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Criteria $criteria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Criteria $criteria)
    {
        //
    }
}
