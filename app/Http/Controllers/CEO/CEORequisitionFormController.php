<?php

namespace App\Http\Controllers\CEO;

use App\Http\Controllers\Controller;
use App\Models\RequisitionForm;
use App\Models\RequisitionItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CEORequisitionFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requisitionForms = RequisitionForm::where('status',2)->get();
        return view('ceo.requisitionForm.index', compact('requisitionForms'));
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
        //
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
    public function edit(RequisitionForm $requisitionForm)
    {
        $requisitionItems = RequisitionItem::where('requisition_form_id', $requisitionForm->id)->get();
        return view('ceo.requisitionForm.edit', compact('requisitionForm', 'requisitionItems'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    public function forward(Request $request, RequisitionForm $requisitionForm):RedirectResponse
    {
        $validated = $request->validate([
            'status'=>'required',
            'ceoRemarks'=>'required'
        ]);
        $requisitionForm->update($validated);

        return to_route('ceo.requisitionForm.index')->with('message','Approved');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
