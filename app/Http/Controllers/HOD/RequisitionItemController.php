<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use App\Models\RequisitionItem;
use Illuminate\Http\Request;

class RequisitionItemController extends Controller
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'requisition_form_id' => 'required',
            'itemDescription' => 'required',
            'quantity' => 'required',
            'itemCost' => 'required',
        ]);

        RequisitionItem::create($validated);

        return back()->with('message','Item added successfully');
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
    public function edit(RequisitionItem $requisitionItem)
    {
        return view('hod.requisitionItem.edit', compact('requisitionItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RequisitionItem $requisitionItem)
    {
        $validated = $request->validate([
            'itemDescription' => 'required',
            'quantity' => 'required',
            'itemCost' => 'required',
        ]);

        $requisitionItem->update($validated);

        return to_route('hod.requisitionForm.edit',$requisitionItem->requisition_form_id)->with('message','item updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequisitionItem $requisitionItem)
    {
        $requisitionItem->delete();

        return back()->with('message', 'The item has been deleted');
    }
}
