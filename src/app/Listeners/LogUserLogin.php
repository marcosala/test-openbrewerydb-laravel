<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Services\TokenService;

class LogUserLogin
{
    protected $tokenService;

    public function __construct(TokenService $tokenService)
    {
        $this->tokenService = $tokenService;
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        $this->tokenService->generateAndSaveToken($event->user->id);
    }
}
