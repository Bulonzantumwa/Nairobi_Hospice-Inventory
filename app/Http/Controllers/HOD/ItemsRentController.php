<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use App\Models\Condition;
use App\Models\ItemsRent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ItemsRentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemsRents = ItemsRent::all();
        return view('hod.itemsRent.index', compact('itemsRents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $conditions = Condition::all();
        return view('hod.itemsRent.create', compact('conditions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $validated = $request->validate([
            'itemName' => 'required',
            'quantity' => 'required',
            'condition_id' => 'required',
            'deposit' => 'required',
            'weeklyCharge' => 'required'
        ]);

        ItemsRent::create($validated);

        return to_route('hod.itemsRent.index')->with('message','Items saved');
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
    public function edit(ItemsRent $itemsRent)
    {
        $conditions = Condition::all();
        return view('hod.itemsRent.edit', compact('itemsRent', 'conditions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemsRent $itemsRent):RedirectResponse
    {
        $validated = $request->validate([
            'itemName' => 'required',
            'quantity' => 'required',
            'condition_id' => 'required',
            'deposit' => 'required',
            'weeklyCharge' => 'required'
        ]);

        $itemsRent->update($validated);

        return to_route('hod.itemsRent.index')->with('message','Item Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemsRent $itemsRent)
    {
        $itemsRent->delete();

        return back()->with('message','Successfully Removed');
    }
}
