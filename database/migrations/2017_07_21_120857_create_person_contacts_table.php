<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('person_id')->nullable()->unsigned();
            $table->string('title');
            $table->string('phone', 20);
            $table->string('observation')->nullable();
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
        Schema::dropIfExists('person_contacts');
    }
}
