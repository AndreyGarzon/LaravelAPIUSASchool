<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('session_game_id')->constrained()->onDelete('cascade');
            $table->foreignId('game_id')->constrained()->onDelete('cascade');
            $table->foreignId('game_option_id')->constrained()->onDelete('cascade');
            $table->integer('priority');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('game_results', function (Blueprint $table) {
            $table->dropForeign(['session_game_id']);
            $table->dropForeign(['game_id']);
            $table->dropForeign(['game_option_id']);
        });
        Schema::dropIfExists('game_results');
    }
};
