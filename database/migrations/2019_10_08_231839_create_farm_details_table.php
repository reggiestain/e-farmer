<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farm_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('crop_type',50)->nullable();
            $table->string('seedlings',50)->nullable();
            $table->string('size_of_land',50)->nullable();
            $table->string('year_exstablished',20)->nullable();     
            $table->string('district',100)->nullable();
            $table->string('longitude',30)->nullable();
            $table->string('latitude',30)->nullable();
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
        Schema::dropIfExists('farm_details');
    }
}
