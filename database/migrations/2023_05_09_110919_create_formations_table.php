<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('nbr_place', 2);
            $table->enum('permanence',[1,2])->default(1);
            $table->enum('status', ['started', 'finished', 'closed','open'])->default('open');
            $table->date('start');
            $table->date('end');
            // permanence
            $table->text('description');

            
            // $table->unsignedBigInteger('company_id')->nullable(); 
            $table->foreignId('company_id')->references('id')->on('companies'); 

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
        Schema::dropIfExists('formations');
    }
}
