<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationEducationInstitutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formation_education_institutes', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            // $table->unsignedBigInteger('formation_id'); 
            $table->foreignId('formation_id')->references('id')->on('formations')->onDelete('cascade'); 
            
            // $table->unsignedBigInteger('degree_id'); 
            $table->foreignId('degree_id')->references('id')->on('degree_institutes')->onDelete('cascade'); 

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
        Schema::dropIfExists('formation_education_institutes');
    }
}
