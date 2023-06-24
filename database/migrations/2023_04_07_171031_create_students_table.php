<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email', 50)->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->date('dateBirth');
            $table->enum('gender',['Male','Female']);

            // $table->string('avatar',255)->nullable();

            $table->foreignId('municipal_id')->nullable(); 
            $table->foreign('municipal_id')->references('id')->on('municipals'); 
            
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
        Schema::dropIfExists('students');
    }
}
