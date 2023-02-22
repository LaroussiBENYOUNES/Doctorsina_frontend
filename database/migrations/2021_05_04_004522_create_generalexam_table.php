<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateGeneralexamTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('generalexam',function(Blueprint $table){
            $table->increments("id");
            $table->decimal("weight", 15, 2)->nullable();
            $table->decimal("size", 15, 2)->nullable();
            $table->decimal("fever", 15, 2)->nullable();
            $table->integer("consultation_id")->references("id")->on("consultation");
            $table->integer("speciality_id")->references("id")->on("speciality");
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
        Schema::drop('generalexam');
    }

}