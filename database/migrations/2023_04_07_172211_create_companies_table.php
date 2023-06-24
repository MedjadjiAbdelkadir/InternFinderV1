<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->string('phone',50)->unique();
            $table->string('address');
            $table->text('description')->nullable();
            $table->string('category');

            
            $table->enum('company_type', ['Public', 'Private'])->default('Public') ;
            $table->string('avatar',255)->nullable();

            // $table->unsignedBigInteger('municipal_id')->nullable(); 
            $table->foreignId('municipal_id')->references('id')->on('municipals'); 
            

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
        Schema::dropIfExists('companies');
    }
}
