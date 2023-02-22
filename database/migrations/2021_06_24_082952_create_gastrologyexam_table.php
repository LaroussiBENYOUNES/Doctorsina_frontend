<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateGastrologyexamTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('gastrologyexam',function(Blueprint $table){
            $table->increments("id");
            $table->string("way")->nullable();
            $table->string("gastroscopy")->nullable();
            $table->string("colonoscopy")->nullable();
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
        Schema::drop('gastrologyexam');
    }

}