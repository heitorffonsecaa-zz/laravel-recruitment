<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->string('type')->comment('business or course or education');
            $table->string('title')->nullable();
            $table->string('company_name')->comment('school or employer');
            $table->string('degree')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('activity_histories', function (Blueprint $table){
            $table->unsignedInteger('city_id')->after('uuid');
            $table->unsignedInteger('user_id')->after('city_id');

            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activity_histories', function (Blueprint $table){
            $table->dropForeign(['city_id', 'user_id']);
            $table->dropColumn(['city_id', 'user_id']);
        });

        Schema::dropIfExists('activity_histories');
    }
}
