<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpousalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spousal_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('farmer_id');
            $table->string('s_firstname',30)->nullable();
            $table->string('s_surname',30)->nullable();
            $table->string('s_birth_date',20)->nullable();
            $table->string('s_mobile',12)->nullable();
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
        Schema::dropIfExists('spousal_details');
    }
}
