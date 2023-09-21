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
        Schema::create('standings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('club_id');
            $table->integer('play')->default(0);
            $table->integer('point')->default(0);
            $table->integer('win')->default(0);
            $table->integer('draw')->default(0);
            $table->integer('lose')->default(0);
            $table->integer('goal_win')->default(0);
            $table->integer('goal_lose')->default(0);

            $table->foreign('club_id')->references('id')->on('clubs');
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
        Schema::dropIfExists('standings');
    }
};
