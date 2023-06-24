<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formation_languages', function (Blueprint $table) {
            $table->id();
            
            // $table->unsignedBigInteger('formation_id'); 
            $table->foreignId('formation_id')->references('id')->on('formations')->onDelete('cascade'); 

            // $table->unsignedBigInteger('language_id'); 
            $table->foreignId('language_id')->references('id')->on('list_languages')->onDelete('cascade'); 

            // $table->unsignedBigInteger('level_id'); 
            $table->foreignId('level_id')->references('id')->on('level_languages')->onDelete('cascade'); 

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
        Schema::dropIfExists('formation_languages');
    }
}
