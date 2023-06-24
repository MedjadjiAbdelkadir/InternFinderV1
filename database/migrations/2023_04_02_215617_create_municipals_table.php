<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipalsTable extends Migration{

    public function up()
    {
        Schema::create('municipals', function (Blueprint $table) {
            $table->id();
            $table->string('post_code')->unique();
            $table->string('name');
            $table->string('ar_name');

            // $table->unsignedBigInteger('state_id')->nullable(); 
            $table->foreignId('state_id')->references('id')->on('states')->onDelete('cascade'); 

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
        Schema::dropIfExists('municipals');
    }
}
