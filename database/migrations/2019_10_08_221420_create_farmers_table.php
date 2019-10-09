<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('othernames');
            $table->string('surname');
            $table->string('mobile');     
            $table->string('mobile2');
            $table->string('email')->unique();
            $table->string('email2')->unique();
            $table->enum('gender', ['Male','Female']);
            $table->string('age');
            $table->string('birth_date');
            $table->string('birth_place');
            $table->string('marital_status');
            $table->integer('number_of_children');
            $table->integer('number_of_dependencies');
            $table->integer('address_id');
            $table->text('postal_address');            
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
        Schema::dropIfExists('farmers');
    }
}
