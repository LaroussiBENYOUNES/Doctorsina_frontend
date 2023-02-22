<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreatePneumologyexamTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('pneumologyexam',function(Blueprint $table){
            $table->increments("id");
            $table->string("dyspne")->nullable();
            $table->string("toux")->nullable();
            $table->string("hoqqet")->nullable();
            $table->integer("consultation_id")->references("id")->on("consultation")->nullable();
            $table->integer("speciality_id")->references("id")->on("speciality")->nullable();
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
        Schema::drop('pneumologyexam');
    }

}