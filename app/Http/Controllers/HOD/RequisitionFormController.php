<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use App\Models\RequisitionForm;
use App\Models\RequisitionItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RequisitionFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requisitionForms = RequisitionForm::where('status',1)->orWhere('status',0)->orWhere('status', -2)->get();
        return view('hod.requisitionForm.index', compact('requisitionForms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hod.requisitionForm.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $validated = $request->validate([
            'requisitionName'=>'required',
            'department'=>'required',
            'user_id'=>'required'
        ]);
        RequisitionForm::create($validated);

        return to_route('hod.requisitionForm.index')->with('message', 'Requisition created successfully');
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
        return view('hod.requisitionForm.edit', compact('requisitionForm', 'requisitionItems'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RequisitionForm $requisitionForm)
    {
        $validated = $request->validate([
            'requisitionName'=>'required',
            'department'=>'required',
        ]);

        $requisitionForm->update($validated);

        return back()->with('message','Requisition Successfully Updated');
    }

    public function forward(Request $request, RequisitionForm $requisitionForm):RedirectResponse
    {
        $validated = $request->validate([
            'status'=>'required'
        ]);
        $requisitionForm->update($validated);

        return to_route('hod.requisitionForm.index')->with('message','Forwarded to Finance Department for Approval');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequisitionForm $requisitionForm)
    {
        $requisitionForm->delete();

        return back()->with('message','Requisition has been removed');
    }
}
