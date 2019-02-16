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
            $table->string('link')->nullable();
            $table->text('description')->default('');
            $table->timestamp('show_time')->default(now());
            $table->foreign('file_id')->references('id')->on('files')->onDelete('set null')->nullable();
            $table->foreign('hall_of_fame_id')->references('id')->on('hall_of_frame')->onDelete('set null')->nullable();
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
