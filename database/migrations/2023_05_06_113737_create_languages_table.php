<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('student_id'); 
            $table->foreignId('student_id')->references('id')
                ->on('students')->onDelete('cascade'); 
            // $table->unsignedBigInteger('language_id'); 
            $table->foreignId('language_id')->references('id')
                  ->on('list_languages')->onDelete('cascade'); 

            // $table->unsignedBigInteger('level_id'); 
            $table->foreignId('level_id')->references('id')
                ->on('level_languages')->onDelete('cascade'); 

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
        Schema::dropIfExists('languages');
    }
}
