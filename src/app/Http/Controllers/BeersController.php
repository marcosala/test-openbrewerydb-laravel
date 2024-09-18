<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
class BeersController extends Controller
{   
    public function index()
    {
       
        // Passa l'elenco delle birre alla vista
        return view('beers.index', ['beers' => ['ipa','apa']]);
    }
}
