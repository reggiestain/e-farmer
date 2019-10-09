<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Officials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('othernames');
            $table->string('surname');
            $table->string('mobile');
            $table->string('email')->unique();
            $table->enum('gender', ['Male','Female']); 
            $table->string('birth_date');
            $table->string('appl_number')->unique();
            $table->integer('region');
            $table->integer('district');
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
        Schema::dropIfExists('officials');
    }
}
