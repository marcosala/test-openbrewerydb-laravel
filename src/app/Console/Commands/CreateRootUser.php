<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateRootUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-root-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando per la creazione dell\'utente root';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::where('id', 1)->first();
      
        if (!$user) {
            $user = new User();
            $user->id = 1;
            $user->name = 'root'; 
            $user->email = 'root@root.it'; 
            $user->password = Hash::make('password'); 
            $user->save();

            $this->info('Utente root creato con successo.');
        } else {
            $this->warn('L\'utente root esiste già.');
        }

        return 0;
    }
}
