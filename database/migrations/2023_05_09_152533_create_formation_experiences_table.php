<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formation_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('specialty');
            
            // $table->unsignedBigInteger('formation_id'); 
            $table->foreignId('formation_id')->references('id')->on('formations')->onDelete('cascade'); 
        
            // $table->unsignedBigInteger('duration_id'); 
            $table->foreignId('duration_id')->references('id')->on('duration_experiences')->onDelete('cascade'); 

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
        Schema::dropIfExists('formation_experiences');
    }
}
