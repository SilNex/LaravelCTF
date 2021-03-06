<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('point');
            $table->string('title');
            $table->string('flag');
            $table->string('link')->nullable();
            $table->text('description')->nullable();
            $table->string('genre');
            $table->timestamp('show_at')->default(now());
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
        Schema::dropIfExists('challenges');
    }
}
