<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('match_games', function (Blueprint $table) {
        $table->id();
        $table->date('match_date');
        $table->foreignId('venue_id')->constrained()->onDelete('cascade');
        $table->foreignId('team_a_id')->constrained('teams')->onDelete('cascade');
        $table->foreignId('team_b_id')->constrained('teams')->onDelete('cascade');
        $table->timestamps();
        $table->softDeletes(); 
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('match_games');
    }
};
