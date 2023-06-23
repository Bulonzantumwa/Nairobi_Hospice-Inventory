<?php

namespace App\Http\Controllers\CEO;

use App\Http\Controllers\Controller;
use App\Models\ClinicalInventory;
use App\Models\DrugList;
use App\Models\ItemsRent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function clinicInventory()
    {
        $clinicalInventories = ClinicalInventory::all();
        return view('ceo.inventory.clinicInventory', compact('clinicalInventories'));
    }

    public function itemsRent()
    {
        $itemsRents = ItemsRent::all();
        return view('ceo.inventory.itemsRent', compact('itemsRents'));
    }

    public function drugList()
    {
        $drugLists = DrugList::all();
        return view('ceo.inventory.drugList', compact('drugLists'));
    }
}
