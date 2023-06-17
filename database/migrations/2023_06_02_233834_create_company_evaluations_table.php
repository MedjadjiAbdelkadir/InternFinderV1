<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyEvaluationsTable extends Migration{

    public function up()
    {
        Schema::create('company_evaluations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('apply_id'); 
            $table->foreign('apply_id')->references('id')->on('applies')->onDelete('cascade'); 
        
            $table->unsignedBigInteger('formation_id'); 
            $table->foreign('formation_id')->references('id')->on('formations')->onDelete('cascade'); 
        
            $table->unsignedBigInteger('student_id'); 
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

            $table->enum('time',[1,2,3,4,5])->default(5);
            $table->enum('rules_conditions',[1,2,3,4,5])->default(5);
            $table->enum('development',[1,2,3,4,5])->default(5);
            $table->enum('team',[1,2,3,4,5])->default(5);

            $table->text('remark')->nullable();
            

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('company_evaluations');
    }
}
