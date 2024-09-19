<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
class LogUserLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        die('login!');
    }
}
