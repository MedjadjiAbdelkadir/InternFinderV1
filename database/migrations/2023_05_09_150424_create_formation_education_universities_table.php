<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationEducationUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formation_education_universities', function (Blueprint $table) {
            $table->id();

            // $table->unsignedBigInteger('formation_id'); 
            $table->foreignId('formation_id')->references('id')->on('formations')->onDelete('cascade'); 

            // $table->unsignedBigInteger('specialty_id'); 
            $table->foreignId('specialty_id')->references('id')->on('specialty_universities')->onDelete('cascade'); 

            // $table->unsignedBigInteger('degree_id'); 
            $table->foreignId('degree_id')->references('id')->on('degree_universities')->onDelete('cascade'); 

            $table->softDeletes();
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
        Schema::dropIfExists('formation_education_universities');
    }
}
