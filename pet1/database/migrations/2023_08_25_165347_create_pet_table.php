<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->integer('type_id')->unsigned();
            $table->string('image_url' , 200)->nullable();
            $table->timestamps();
            // foreign key
            $table->foreign('type_id')->references('id')->on('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pet');
    }
}