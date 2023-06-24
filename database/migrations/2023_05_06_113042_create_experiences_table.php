<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration{

    public function up(){
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('specialty');
            $table->string('company')->default('Freelancer');
            $table->text('description');

            // $table->unsignedBigInteger('student_id'); 
            $table->foreignId('student_id')->references('id')
                ->on('students')->onDelete('cascade'); 

            // $table->unsignedBigInteger('duration_id'); 
            $table->foreignId('duration_id')->references('id')
                ->on('duration_experiences')->onDelete('cascade'); 

            // $table->unsignedBigInteger('job_id'); 
            $table->foreignId('job_id')->references('id')
                ->on('jobs')->onDelete('cascade'); 

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
        Schema::dropIfExists('experiences');
    }
}
