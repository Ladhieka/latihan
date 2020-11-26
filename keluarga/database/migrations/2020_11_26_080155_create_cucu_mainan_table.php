<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCucuMainanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cucu_mainan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cucu_id')->unsigned();
            $table->integer('mainan_id')->unsigned();
            $table->foreign('cucu_id')->references('id')->on('cucus')->onDelete('cascade');
            $table->foreign('mainan_id')->references('id')->on('mainans')->onDelete('cascade');
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
        Schema::dropIfExists('cucu_mainan');
    }
}
