<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClinicalInventory;
use App\Models\DrugList;
use App\Models\ItemsRent;
use Illuminate\Http\Request;

class SAInventoryController extends Controller
{
    public function clinicInventory()
    {
        $clinicalInventories = ClinicalInventory::all();
        return view('superAdmin.inventory.clinicInventory', compact('clinicalInventories'));
    }

    public function itemsRent()
    {
        $itemsRents = ItemsRent::all();
        return view('superAdmin.inventory.itemsRent', compact('itemsRents'));
    }

    public function drugList()
    {
        $drugLists = DrugList::all();
        return view('superAdmin.inventory.drugList', compact('drugLists'));
    }
}
