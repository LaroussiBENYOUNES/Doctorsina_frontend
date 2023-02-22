<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateSiteTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('site',function(Blueprint $table){
            $table->increments("id");
            $table->integer("medicalstructure_id")->references("id")->on("medicalstructure");
            $table->integer("country_id")->references("id")->on("country");
            $table->string("label");
            $table->string("alias")->nullable();
            $table->text("description")->nullable();
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
        Schema::drop('site');
    }

}