<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteIdentity;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SiteIdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siteIdentity = SiteIdentity::orderBy('id','desc')->first();
        return view('superAdmin.siteIdentity.index', compact('siteIdentity'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superAdmin.siteIdentity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'siteName' => 'required|min:3',
            'siteTag' => 'required|min:3',
            'mainUrl' => 'required|min:3',
        ]);

        SiteIdentity::updateOrCreate(
            ['siteName' => $validated['siteName']], // Attributes to find the record
            ['siteTag' => $validated['siteTag'], 'mainUrl' => $validated['mainUrl']] // Attributes to update or create
        );

        return to_route('superAdmin.siteIdentity.index')->with('message','This has been updated');
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
    public function edit(SiteIdentity $siteIdentity)
    {
        return view('superAdmin.siteIdentity.edit', compact('siteIdentity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SiteIdentity $siteIdentity)
    {
        $validated = $request->validate([
            'siteName' => 'required|min:3',
            'siteTag' => 'required|min:3',
            'mainUrl' => 'required|min:3',
        ]);

        $siteIdentity -> update($validated);

        return to_route('superAdmin.siteIdentity.index')->with('message','This has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
