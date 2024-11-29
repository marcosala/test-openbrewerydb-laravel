<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;
use App\Models\UserToken;
use Mockery;
use Illuminate\Support\Facades\Artisan;



class BreweryControllerTest extends TestCase
{
    public function test_api_work_with_token()
    {
        //utente con token
        $user = User::factory()->create();
        $userToken = UserToken::factory()->create([
            'user_id' => $user->id,
        ]);

        $breweries = [
            ['id' => 1, 'name' => 'Birreria Menaresta'],
            ['id' => 2, 'name' => 'Birrificio di Lambrate'],
        ];

     
        Http::fake([
            config('api.openbrewery.base_url') => Http::response($breweries, 200)
        ]);

 
        $this->actingAs($user);
        $response = $this->get(route('breweries.index'));
        $response->assertStatus(200);

    }

    public function test_api_fail_without_token()
    {
        //utente senza token
        $user = User::factory()->create();
     
      
        $breweries = [
            ['id' => 1, 'name' => 'Birreria Menaresta'],
            ['id' => 2, 'name' => 'Birrificio di Lambrate'],
        ];

        // Simuliamo la risposta di una chiamata HTTP
        Http::fake([
            config('api.openbrewery.base_url') => Http::response($breweries, 200)
        ]);

        $this->actingAs($user);

        $response = $this->get(route('breweries.index'));

        $this->assertNotEquals(200, $response->status());

    }

}
