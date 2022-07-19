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
        Schema::create('session_games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('state_session_game_id')->constrained()->onDelete('cascade');
            $table->foreignId('group_id')->constrained()->onDelete('cascade');
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
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
        Schema::table('session_games', function (Blueprint $table) {
            $table->dropForeign(['state_session_game_id']);
            $table->dropForeign(['group_id']);
            $table->dropForeign(['student_id']);
        });
        Schema::dropIfExists('session_games');
    }
};
