<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration{

    public function up()
    {

        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->integer('code')->unique();
            $table->string('name')->unique();
            $table->string('ar_name')->unique();

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
        Schema::dropIfExists('states');
    }
}
