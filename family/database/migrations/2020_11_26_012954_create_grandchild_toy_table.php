<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrandchildToyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grandchild_toy', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('grandchild_id')->unsigned();
            $table->integer('toy_id')->unsigned();
            $table->foreign('grandchild_id')->references('id')->on('grandchildren')->onDelete('cascade');
            $table->foreign('toy_id')->references('id')->on('toys')->onDelete('cascade');
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
        Schema::dropIfExists('grandchild_toy');
    }
}
