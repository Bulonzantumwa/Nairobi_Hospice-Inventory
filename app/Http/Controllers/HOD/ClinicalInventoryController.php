<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use App\Models\ClinicalInventory;
use App\Models\Condition;
use App\Models\Location;
use App\Models\RequisitionForm;
use App\Models\Utility;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClinicalInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clinicalInventories = ClinicalInventory::all();
        return view('hod.clinicalInventory.index', compact('clinicalInventories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $conditions = Condition::all();
        $utilities = Utility::all();
        $locations = Location::all();
        return view('hod.clinicalInventory.create', compact('conditions', 'utilities', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required',
            'quantity' => 'required',
            'condition_id' => 'required',
            'utility_id' => 'required',
            'location_id' => 'required'
        ]);

        ClinicalInventory::create($validated);

        return to_route('hod.clinicalInventory.index')->with('message','Item has been added');
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
    public function edit(ClinicalInventory $clinicalInventory)
    {
        $conditions = Condition::all();
        $utilities = Utility::all();
        $locations = Location::all();
        return view('hod.clinicalInventory.edit', compact('clinicalInventory', 'conditions', 'utilities', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClinicalInventory $clinicalInventory):RedirectResponse
    {
        $validated = $request->validate([
            'description' => 'required',
            'quantity' => 'required',
            'condition_id' => 'required',
            'utility_id' => 'required',
            'location_id' => 'required'
        ]);

        $clinicalInventory->update($validated);

        return to_route('hod.clinicalInventory.index')->with('message','Item updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClinicalInventory $clinicalInventory)
    {
        $clinicalInventory->delete();

        return back()->with('message','Item removed');
    }
}
