<?php

namespace App\Http\Controllers\CEO;

use App\Http\Controllers\Controller;
use App\Models\RequisitionForm;
use App\Models\RequisitionItem;
use Illuminate\Http\Request;

class CEOFormsController extends Controller
{
    public function index()
    {
        $requisitionForms = RequisitionForm::where('status',3)->get();
        return view('ceo.ceoForm.index', compact('requisitionForms'));
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
        return view('ceo.ceoForm.edit', compact('requisitionForm', 'requisitionItems'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
