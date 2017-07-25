<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('person_id')->nullable()->unsigned();
            $table->string('title');
            $table->string('zipcode', 20);
            $table->string('street');
            $table->string('number', 20);
            $table->string('complement');
            $table->string('reference');
            $table->string('neighborhood');
            $table->string('city');
            $table->string('state', 2);
            $table->timestamps();
            $table->foreign('person_id')->references('id')->on('persons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_addresses');
    }
}
