<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeersController extends Controller
{
    public function index()
    {
       
        // Passa l'elenco delle birre alla vista
        return view('beers', ['beers' => ['ipa','apa']]);
    }
}
