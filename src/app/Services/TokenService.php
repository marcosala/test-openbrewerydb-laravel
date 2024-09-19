<?php
namespace App\Services;

use Illuminate\Support\Str;
use App\Models\UserToken;

class TokenService
{
    /**
     * Genera e salva un token per l'utente.
     */
    public function generateAndSaveToken(int $userId): void
    {
        $token = Str::random(60);

        // Salva il token nella tabella users_token
        UserToken::create([
            'user_id' => $userId,
            'token' => $token,
        ]);
    }
}
