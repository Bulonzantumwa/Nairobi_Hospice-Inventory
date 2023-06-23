<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use App\Models\DrugList;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DrugListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drugLists = DrugList::all();
        return view('hod.drugList.index', compact('drugLists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hod.drugList.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'drugName' => 'required',
            'quantity' => 'required',
            'amount' => 'required',
            'expiryDate' => 'required'
        ]);

        DrugList::create($validated);

        return to_route('hod.drugList.index')->with('message','Drug added successfully');
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
    public function edit(DrugList $drugList)
    {
        return view('hod.drugList.edit', compact('drugList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DrugList $drugList)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'drugName' => 'required',
            'quantity' => 'required',
            'amount' => 'required',
            'expiryDate' => 'required'
        ]);

        $drugList->update($validated);

        return to_route('hod.drugList.index')->with('message','Drug updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DrugList $drugList)
    {
        $drugList->delete();

        return back()->with('message','Drug removed from list');
    }
}
