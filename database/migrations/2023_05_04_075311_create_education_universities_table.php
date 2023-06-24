<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_universities', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->date('start');
            $table->date('end');

            // $table->unsignedBigInteger('student_id'); 
            $table->foreignId('student_id')->references('id')
                  ->on('students')->onDelete('cascade'); 

            
            // $table->unsignedBigInteger('university_id'); 
            $table->foreignId('university_id')->references('id')
                  ->on('universities')->onDelete('cascade'); 


            // $table->unsignedBigInteger('specialty_id'); 
            $table->foreignId('specialty_id')->references('id')
                  ->on('specialty_universities')->onDelete('cascade'); 

            // $table->unsignedBigInteger('degree_id'); 
            $table->foreignId('degree_id')->references('id')
                   ->on('degree_universities')->onDelete('cascade'); 

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
        Schema::dropIfExists('education_universities');
    }
}
