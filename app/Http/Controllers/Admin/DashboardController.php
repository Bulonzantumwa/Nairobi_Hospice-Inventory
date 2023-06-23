<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClinicalInventory;
use App\Models\ItemsRent;
use App\Models\RequisitionForm;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $clinicalInventoryItems = ClinicalInventory::all();
        $rentalItems = ItemsRent::all();
        $approvedRequisitions = RequisitionForm::where('status',3)->get();
        $ceoRejectedRequisitions = RequisitionForm::where('status',-3)->get();
        $clinicalInventories = ClinicalInventory::all();
        return view('superAdmin.index', compact('rentalItems', 'clinicalInventoryItems', 'approvedRequisitions', 'ceoRejectedRequisitions', 'clinicalInventories'));
    }
}
