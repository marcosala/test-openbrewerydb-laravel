<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BreweryController extends Controller
{
    public function index(Request $request){
        $perPage = config('api.openbrewery.items_per_page', 5);
        $page = $request->input('page', 1);

        $response = Http::get(config('api.openbrewery.base_url'));
        $breweries = $response->json();

        $total = count($breweries); // Può essere necessario un altro approccio se l'API fornisce un totale diverso
        $totalPages = ceil($total / $perPage);

        $response = Http::get(config('api.openbrewery.base_url'), [
            'page' => $page,
            'per_page' => $perPage,
        ]);

        if ($response->successful()) {
            $breweries = $response->json();
        
            // In assenza di un totale fornito dall'API, possiamo calcolare il totale degli elementi
            $total = count($breweries); // Può essere necessario un altro approccio se l'API fornisce un totale diverso
        
            return view('breweries.index', [
                'breweries' => $breweries,
                'currentPage' => $page,
                'totalPages' => $totalPages,
                'perPage' => $perPage
            ]);
        }

        return abort(500, 'Errore nella richiesta all\'API');
    }
}
