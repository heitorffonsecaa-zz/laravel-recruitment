<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->morphs('addressable');
            $table->string('zipcode');
            $table->string('street');
            $table->string('number');
            $table->string('complement')->nullable();
            $table->string('neighborhood');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('addresses', function (Blueprint $table){
            $table->unsignedInteger('city_id')->after('neighborhood');
            $table->unsignedInteger('state_id')->after('city_id');

            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('state_id')->references('id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function (Blueprint $table){
            $table->dropColumn(['city_id', 'state_id']);
        });

        Schema::dropIfExists('addresses');
    }
}
