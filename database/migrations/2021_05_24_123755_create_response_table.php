<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateResponseTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('response',function(Blueprint $table){
            $table->increments("id");
            $table->integer("question_id")->references("id")->on("question");
            $table->integer("consultation_id")->references("id")->on("consultation");
            $table->text("patient_response");
            $table->tinyInteger("accepted")->default(1)->nullable();
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
        Schema::drop('response');
    }

}