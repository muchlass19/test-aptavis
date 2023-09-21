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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('home_team');
            $table->unsignedBigInteger('away_team');
            $table->integer('home_score')->default(0);
            $table->integer('away_score')->default(0);
            $table->date('match_date');
            $table->string('status')->default('ongoing');
            $table->timestamps();

            $table->foreign('home_team')->references('id')->on('clubs');
            $table->foreign('away_team')->references('id')->on('clubs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
};
