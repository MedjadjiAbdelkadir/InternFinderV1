<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationInstitutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_institutes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('specialty');
            $table->text('description');
            $table->date('start');
            $table->date('end');

            // $table->unsignedBigInteger('student_id'); 
            $table->foreignId('student_id')->references('id')
                  ->on('students')->onDelete('cascade'); 
            
            // $table->unsignedBigInteger('degree_id'); 
            $table->foreignId('degree_id')->references('id')
                  ->on('degree_institutes')->onDelete('cascade'); 

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
        Schema::dropIfExists('education_institutes');
    }
}
