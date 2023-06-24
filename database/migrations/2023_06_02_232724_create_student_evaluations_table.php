<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentEvaluationsTable extends Migration
{

    public function up()
    {
        Schema::create('student_evaluations', function (Blueprint $table) {
            $table->id();

            // $table->unsignedBigInteger('apply_id'); 
            $table->foreignId('apply_id')->references('id')->on('applies')->onDelete('cascade'); 
        
            // $table->unsignedBigInteger('formation_id'); 
            $table->foreignId('formation_id')->references('id')->on('formations')->onDelete('cascade'); 
        
            // $table->unsignedBigInteger('student_id'); 
            $table->foreignId('student_id')->references('id')->on('students')->onDelete('cascade');
            
            $table->enum('time',[1,2,3,4,5])->default(5);
            $table->enum('rules_conditions',[1,2,3,4,5])->default(5);
            $table->enum('environment',[1,2,3,4,5])->default(5);
            $table->enum('content',[1,2,3,4,5])->default(5);
            $table->text('remark')->nullable();
            
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
        Schema::dropIfExists('student_evaluations');
    }
}
