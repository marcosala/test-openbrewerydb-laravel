<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\UserToken;

class BreweryController extends Controller
{
    public function __construct()
    {
        $user = Auth::user();

        // Se l'utente non ha token, blocco l'accesso all'api
        if (!UserToken::where('user_id', $user->id)->exists()) {
            Auth::logout();
            abort(403, 'Accesso negato. Nessun token associato all\'utente.');
        }
    }
    public function index(Request $request){

        $perPage = config('api.openbrewery.items_per_page', 5);
        $page = $request->input('page', 1);

        $response = Http::get(config('api.openbrewery.base_url'));
        $breweries = $response->json();

        // In assenza di un totale fornito dall'API, cacloclo il totale tramite conteggio
        $total = count($breweries); 
        $totalPages = ceil($total / $perPage);

        $response = Http::get(config('api.openbrewery.base_url'), [
            'page' => $page,
            'per_page' => $perPage,
        ]);

        if ($response->successful()) {
            $breweries = $response->json();
        
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
