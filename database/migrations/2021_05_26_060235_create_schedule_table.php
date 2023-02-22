<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateScheduleTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('schedule',function(Blueprint $table){
            $table->increments("id");
            $table->string("monday");
            $table->string("tuesday");
            $table->string("wednesday");
            $table->string("thursday");
            $table->string("friday");
            $table->string("saturday");
            $table->string("sunday");
            $table->string("label");
            $table->string("alias")->nullable();
            $table->string("description")->nullable();
            $table->tinyInteger("activated")->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('schedule');
    }

}