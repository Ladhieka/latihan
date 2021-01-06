<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationHasMutationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_has_mutations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('donation_id');
            $table->foreign('donation_id')->references('id')->on('donations')->onDelete('cascade');
            $table->unsignedBigInteger('type');
            $table->foreign('type')->references('id')->on('donation_types')->onDelete('cascade');
            $table->integer('credit');
            $table->integer('debet');
            $table->string('description');
            $table->unsignedBigInteger('donation_usage_id');
            $table->foreign('donation_usage_id')->references('id')->on('donation_usages')->onDelete('cascade');
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
        Schema::dropIfExists('donation_has_mutations');
    }
}
