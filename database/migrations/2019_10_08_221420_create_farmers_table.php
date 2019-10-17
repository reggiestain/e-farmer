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
            $table->string('firstname',30);
            $table->string('othernames',30);
            $table->string('surname',30);
            $table->string('mobile',12)->nullable();     
            $table->string('mobile2',12)->nullable();
            $table->string('email')->nullable()->unique();
            $table->enum('gender', ['Male','Female']);
            $table->string('age',10);
            $table->string('birth_date',10);
            $table->string('birth_place',100);
            $table->string('marital_status',20);
            $table->integer('number_of_children');
            $table->integer('number_of_dependencies')->nullable();
            $table->text('address');
            $table->text('postal_address')->nullable();            
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
