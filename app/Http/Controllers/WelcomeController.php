<?php

namespace App\Http\Controllers;

use App\Models\SiteIdentity;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $siteIdentity = SiteIdentity::orderBy('id','desc')->first();
        return view('welcome', compact('siteIdentity'));
    }
}
