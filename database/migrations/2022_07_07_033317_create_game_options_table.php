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
        Schema::create('game_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_group_id')->constrained()->onDelete('cascade');
            $table->string("game_option_name")->nullable();
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
        Schema::table('game_options', function (Blueprint $table) {
            $table->dropForeign(['game_group_id']);
        });
        Schema::dropIfExists('game_options');
    }
};
