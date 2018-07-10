<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSession93039sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_93039s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('exersice_type');
            $table->integer('reps');
            $table->integer('sets');
            $table->string('place');
            $table->date('date_time');
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
        Schema::dropIfExists('session_93039s');
    }
}
