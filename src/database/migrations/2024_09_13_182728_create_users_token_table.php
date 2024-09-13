<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users_token', function (Blueprint $table) {
            $table->id();
            
            // associazione tra user e token con regola di delete a cascata
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            //definizione del campo token con indice UNIQUE
            $table->string('token')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_token');
    }
};
